 <?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
include 'DbConnection.php';
  
   
   $sql = "SELECT * FROM coffee_home";
  $result = mysqli_query($conn, $sql);
$response=array();
if (mysqli_num_rows($result) > 0) {
    // output data of each row
   $response = array();
  while($row=mysqli_fetch_assoc($result)){
    $temp= array(
    'image' =>$row['image'],
    'coffee_name' =>$row['coffee_name'],
    'price' =>$row['price'] );
   
 //$temp['images'] = $row['images']; 
      array_push($response ,$temp);

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