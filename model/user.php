<?php
session_start();

require('UUIDGenerator.php');
function SignUpUser($name, $email, $password){
    $uuid = generateUUID();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO Users (user_id, email, password_hash, name) VALUES (?, ?, ?, ?)";
     include('conn.php');
    try {
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $uuid, $email, $hashedPassword, $name);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['success'] = "Welcome " . $name;
                $_SESSION['login'] = true;
                $_SESSION['user'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['userid'] = $uuid;
                if (isset($_SESSION['requstedurl']) && !empty($_SESSION['requstedurl'])) {
                    header('location: ' . $_SESSION['requstedurl']);
                    unset($_SESSION['requstedurl']);
                } else {
                    header('location: view/product/home.php');
                }
                exit();

            } else {
                $_SESSION['error'] = "This user already exists.";
                header('location: view/product/login.php');
            }

            mysqli_stmt_close($stmt);
        } 
        mysqli_close($conn);
    } catch (Exception $e) {
        $_SESSION['error'] = "you are alredy created account";
    }
    return;
}

function LogdinUser($email, $passworD) {
     include('conn.php');

   $sql = "SELECT * FROM USERS WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $stored_password = $user['password_hash'];
        $name = $user['name'];
        $usserid = $user['user_id'];
        $role = $user['role'];
        if (password_verify($passworD, $stored_password)) {
            $_SESSION['login'] = true;
            $_SESSION['user'] = $name;
            $_SESSION['userid'] = $usserid;
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "welcome back " . $name;
            if (isset($_SESSION['requstedurl']) && !empty($_SESSION['requstedurl'])) {
                if ($role == "Admin") {
                    header('location: ' . $_SESSION['requstedurl']);
                    unset($_SESSION['requstedurl']);
                } else {
                    header('location: ' . $_SESSION['requstedurl']);
                    unset($_SESSION['requstedurl']);
                }
            } else if ($role == "Admin") {
                header('location: view/product/admin.php');
            } else {
                header('location: view/product/home.php');
            }

            exit();
        } else {
            $_SESSION['error'] = "Invalid Password";
            header('location: view/product/login.php');
            exit();
        }
    }else{
        $_SESSION['error'] = "Invalid user Create acoount";
        header('location: view/product/login.php');
    }
    exit();
}
?>
