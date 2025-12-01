<?php
session_start();
require_once 'config.php';

if (isset($_POST['register_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['alerts'][] = ['type'=>'error', 'message'=>'Email already registered!'];
        $_SESSION['active_form'] = 'register';
    } else {
        $stmt = $conn->prepare("INSERT INTO users (fullname, email, password_hash, username) VALUES (?, ?, ?, ?)");
        $username = explode("@", $email)[0];
        $stmt->bind_param("ssss", $name, $email, $password, $username);
        $stmt->execute();

        $_SESSION['alerts'][] = ['type'=>'success','message'=>'Registration successful!'];
        $_SESSION['active_form'] = 'login';
    }

    header("Location: index5.php");
    exit();
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['name'] = $user['fullname'];
        $_SESSION['alerts'][] = ['type'=>'success','message'=>'Login successful!'];
    } else {
        $_SESSION['alerts'][] = ['type'=>'error','message'=>'Incorrect email or password!'];
        $_SESSION['active_form'] = 'login';
    }

    header("Location: index5.php");
    exit();
}
?>
