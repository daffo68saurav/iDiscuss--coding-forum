<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"]== "POST"){
    include '_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    // check whether this email exists
    $existsSql = "select * from `users` where user_email = '$user_email'";
    $result =mysqli_query($conn, $existsSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email already in use";
    }
    else{
        if($pass == $cpass){
          $hash = password_hash($pass, PASSWORD_DEFAULT);
          $sql = "INSERT INTO `users` (`user_email`, `user_pass`, `timestamp`) VALUES ('$user_email', '$hash', current_timestamp())";
          $result = mysqli_query($conn, $sql);
          if($result){
            $showAlert = true;
            header("Location: /forum/index.php?signupsuccess=true");
            exist();
          }
        }
        else{
            $showError = "Passwords do not match";
            
        }
    }
    header("Location: /forum/index.php?signupsuccess=false&error=$showError");
}

?>