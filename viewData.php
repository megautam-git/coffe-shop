 <?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
include 'DbConnection.php';
  
   
   $sql = "SELECT * FROM coffee_desc";
  $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
   $response = array();
  while($row=mysqli_fetch_assoc($result)){
      array_push($response ,array('item' =>$row['item'] , 
    'coffee_type' =>$row['coffee_type'] ,
    'price' =>$row['price'],
    'total' => $row['total']));

  }
   echo json_encode($response);
    /*$response["value"]=1;
    $response["message"]="inserted";*/
    
} else {
     $response["value"]=0;
    $response["message"]="error";
    echo json_encode($response);
}
}else{
  $response["value"]=0;
  $response["message"]="sorry connection problem";
   echo json_encode($response);
}

mysqli_close($conn);
?>