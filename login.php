<?php
  $email=$_POST['email'];
  $password=$_POST['password'];

  // Database connection
  $dbhost = "localhost";
  $dbUsername = "id21015605_shivvishal";
  $dbPassword ="Shiv@123";
  $dbname = "id21015605_heavenlymeals";

  // Create connection
  $conn = new mysqli("$dbhost", "$dbUsername", "$dbPassword", "$dbname");
  if ($conn->connect_error) {
    die('Connection Failed :' . $conn->connect_error);
  } else {

    // Prepare statement with parameterized query
    $stmt = $conn->prepare("SELECT * FROM contact WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Get result and check if row exists
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();

        // Use password hashing for comparison
        if (password_verify($password, $data['password'])) {
            header("Location: home.html");
            exit();
        } else {
            echo "<h2>Incorrect password. Please try again.</h2>";
        }
    } else {
        echo "<h2>User not found. Please try again.</h2>";
    }
  }

  // Close connection
  $conn->close();
?>