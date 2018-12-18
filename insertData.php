<?php 
include 'DbConnection.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...
	//include 'DbConnection.php';
    $response= array();
	$item=$_POST['item'];
	$coffee_type=$_POST['coffee_type'];
	$price=$_POST['price'];
	$total=$_POST['total'];

	$query="insert into coffee_desc(item,coffee_type,price,total) values ('$item','$coffee_type','$price','$total')";
	if (mysqli_query($conn, $query)) {
    //echo "New record created successfully";
    $response["value"]=1;
    $response["message"]="inserted";
    echo json_encode($response);
    
} else {
	$response["value"]=0;
	$response["message"]="sorry try again";
   echo json_encode($response);
}

}else{
	$response["value"]=0;
	$response["message"]="sorry connection problem";
   echo json_encode($response);
}

mysqli_close($conn);
 ?>