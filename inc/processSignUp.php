<?php
  include("config.php");

    $username = htmlentities(strip_tags($_POST['username']));
    $password = htmlentities(strip_tags($_POST['password']));
    $passwordConfirm = htmlentities(strip_tags($_POST['passwordConfirm']));
    $email = htmlentities(strip_tags($_POST['email']));

      $sql = "SELECT Username FROM users WHERE Username ='$username'";
      $result = $conn->query($sql);
      $usercheck = mysqli_num_rows($result);
      if ($usercheck > 0){
        header("Location: ../signup.php?error=username");
        exit();

    } elseif (!FILTER_VAR($email, FILTER_VALIDATE_EMAIL) === true){
      header("Location: ../signup.php?error=email");
      exit();

    } elseif ($password !== $passwordConfirm){
      header("Location: ../signup.php?error=password");
      exit();

    } else {
      $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $username, $password, $email);
      $stmt->execute();

      header("Location: ../success.php");
      exit(); 
  }
?>