<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/database.php';


echo "<pre>"; print_r($_POST); die;
// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../register.php');
    exit;
}

$isAjax = !empty($_POST['ajax']) || (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');

$name = trim($_POST['name'] ?? '');
$email = trim(strtolower($_POST['email'] ?? ''));
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';
$phone = trim($_POST['phone'] ?? '');
$city = trim($_POST['city'] ?? '');
$address = trim($_POST['address'] ?? '');

// Validation
if (empty($name) || empty($email) || empty($password)) {
    $msg = 'Please fill in all required fields (Name, Email, Password).';
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => $msg]);
        exit;
    }
    $_SESSION['flash_error'] = $msg;
    header('Location: ../register.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = 'Please enter a valid email address.';
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => $msg]);
        exit;
    }
    $_SESSION['flash_error'] = $msg;
    header('Location: ../register.php');
    exit;
}

if (!empty($confirmPassword) && $password !== $confirmPassword) {
    $msg = 'Passwords do not match. Please re-enter.';
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => $msg]);
        exit;
    }
    $_SESSION['flash_error'] = $msg;
    header('Location: ../register.php');
    exit;
}

if (strlen($password) < 6) {
    $msg = 'Password must be at least 6 characters long.';
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => $msg]);
        exit;
    }
    $_SESSION['flash_error'] = $msg;
    header('Location: ../register.php');
    exit;
}

// Check if email already registered
$checkStmt = $conn->prepare("SELECT `id` FROM `users` WHERE `email` = ? LIMIT 1");
$checkStmt->bind_param("s", $email);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    $checkStmt->close();
    $msg = 'This email address is already registered. Please login instead.';
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => $msg]);
        exit;
    }
    $_SESSION['flash_error'] = $msg;
    header('Location: ../register.php');
    exit;
}
$checkStmt->close();

// Hash password and insert user record
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
$insertStmt = $conn->prepare("INSERT INTO `users` (`name`, `email`, `password`, `phone`, `address`, `city`) VALUES (?, ?, ?, ?, ?, ?)");

if ($insertStmt) {
    $insertStmt->bind_param("ssssss", $name, $email, $hashedPassword, $phone, $address, $city);
    if ($insertStmt->execute()) {
        $newUserId = $conn->insert_id;
        $insertStmt->close();

        // Automatically log the user in
        $_SESSION['user_id'] = $newUserId;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $_SESSION['flash_success'] = 'Account registered successfully! Welcome to EliteStore.';

        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(['status' => true, 'message' => 'Account created successfully!']);
            exit;
        }
        header('Location: ../profile.php');
        exit;
    } else {
        $err = 'Database error: ' . $insertStmt->error;
        $insertStmt->close();
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(['status' => false, 'message' => $err]);
            exit;
        }
        $_SESSION['flash_error'] = $err;
        header('Location: ../register.php');
        exit;
    }
} else {
    $err = 'Failed to prepare query: ' . $conn->error;
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => $err]);
        exit;
    }
    $_SESSION['flash_error'] = $err;
    header('Location: ../register.php');
    exit;
}
?>
