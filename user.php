<?php
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];

	if (!empty($username) || !empty($email) || !empty($phone) || !empty($password) ) {
	    $dbhost = "localhost";
	    $dbUsername = "id21015605_shivvishal";
	    $dbPassword ="Shiv@123";
	    $dbname = "id21015605_heavenlymeals";
	
	    //create connection
	    $conn = new mysqli("$dbhost", "$dbUsername","$dbPassword","$dbname");
	    if ($conn->connect_error){
	         die('Connection Failed  :'.$conn->connect_error);
	        
	    } else{
	        $stmt= $conn->prepare("insert into contact (username, email, phone, password)
	        values(?, ?, ?, ?)");
	        $stmt->bind_param("ssis", $username, $email, $phone, $password );
	        $stmt->execute();
	        echo "<h2> Submit Successfully.....</h2>";
	        $stmt->close();
	        $conn->close();
	        
	    }
	    
	}
	else {
	   echo "All fields are required";
	   die();
	}
?>