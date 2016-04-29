<?php
    $con = mysqli_connect("mysql4.000webhost.com", "a4175940_nss", "abcde12345", "a4175940_test");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM jjuser WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $userID, $username, $email, $password);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;  
        $response["username"] = $username;
		$response["email"] = $email;
        $response["password"] = $password;
    }
    
    echo json_encode($response);
?>