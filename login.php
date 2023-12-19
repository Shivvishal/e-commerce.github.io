<?php
   $email=$_POST['email'];
   $password=$_POST['password'];
   
      //database connection here
        $dbhost = "localhost";
	    $dbUsername = "id21015605_shivvishal";
	    $dbPassword ="Shiv@123";
	    $dbname = "id21015605_heavenlymeals";
	
	    //create connection
	    $conn = new mysqli("$dbhost", "$dbUsername","$dbPassword","$dbname");
	     if ($conn->connect_error){
	         die('Connection Failed  :'.$conn->connect_error);
	    }
	     else{
	        $stmt= $conn->prepare("select * from contact where email=?");
	        $stmt->bind_param("s",$email);
	        $stmt->execute();
	        $stmt_result=$stmt->get_result();
	        if($stmt_result->num_rows>0){
	           $data=$stmt_result->fetch_assoc();
	           if($data['password']===$password){
	               echo "<h2>Login Successfully</h2>";
	           }
	           else{
	               echo "<h2>Invalid Email or Password</h2>";
	             }
	        }
	        else{
	               echo "<h2>Invalid Email or Password</h2>";
	             }
	     }
