<?php
    $con = mysqli_connect("mysql4.000webhost.com", "a4175940_nss", "abcde12345", "a4175940_test");
    
    $username = $_POST["username"];
	$email = $_POST["email"];
    $password = $_POST["password"];
    $statement = mysqli_prepare($con, "INSERT INTO jjuser (username, email, password) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($statement, "siss", $username, $email, $password);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>