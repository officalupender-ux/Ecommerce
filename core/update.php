<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../config/database.php';

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../profile.php');
    exit;
}

$isAjax = !empty($_POST['ajax']) || (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');

// Ensure user is logged in
if (empty($_SESSION['user_id'])) {
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => 'Please log in to update details.']);
        exit;
    }
    $_SESSION['flash_error'] = 'Please log in to update details.';
    header('Location: ../login.php');
    exit;
}

$userId = (int)$_SESSION['user_id'];
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$address = trim($_POST['address'] ?? '');
$city = trim($_POST['city'] ?? '');
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

// Basic validation
if (empty($name) || empty($email)) {
    $msg = 'Name and email are required fields.';
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => $msg]);
        exit;
    }
    $_SESSION['flash_error'] = $msg;
    header('Location: ../profile.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = 'Please provide a valid email address.';
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => $msg]);
        exit;
    }
    $_SESSION['flash_error'] = $msg;
    header('Location: ../profile.php');
    exit;
}

// Check if email already taken by another account
$checkStmt = $conn->prepare("SELECT id FROM `users` WHERE `email` = ? AND `id` != ? LIMIT 1");
$checkStmt->bind_param("si", $email, $userId);
$checkStmt->execute();
$checkStmt->store_result();
if ($checkStmt->num_rows > 0) {
    $checkStmt->close();
    $msg = 'Email address is already in use by another account.';
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => $msg]);
        exit;
    }
    $_SESSION['flash_error'] = $msg;
    header('Location: ../profile.php');
    exit;
}
$checkStmt->close();

// Update query (with or without password)
if (!empty($password)) {
    if ($password !== $confirmPassword) {
        $msg = 'The new passwords do not match.';
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(['status' => false, 'message' => $msg]);
            exit;
        }
        $_SESSION['flash_error'] = $msg;
        header('Location: ../profile.php');
        exit;
    }
    if (strlen($password) < 6) {
        $msg = 'New password must be at least 6 characters long.';
        if ($isAjax) {
            header('Content-Type: application/json');
            echo json_encode(['status' => false, 'message' => $msg]);
            exit;
        }
        $_SESSION['flash_error'] = $msg;
        header('Location: ../profile.php');
        exit;
    }
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $updateStmt = $conn->prepare("UPDATE `users` SET `name` = ?, `email` = ?, `phone` = ?, `address` = ?, `city` = ?, `password` = ? WHERE `id` = ?");
    $updateStmt->bind_param("ssssssi", $name, $email, $phone, $address, $city, $hashedPassword, $userId);
} else {
    $updateStmt = $conn->prepare("UPDATE `users` SET `name` = ?, `email` = ?, `phone` = ?, `address` = ?, `city` = ? WHERE `id` = ?");
    $updateStmt->bind_param("sssssi", $name, $email, $phone, $address, $city, $userId);
}

if ($updateStmt->execute()) {
    $updateStmt->close();
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;

    $successMsg = 'Profile details updated successfully!';
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['status' => true, 'message' => $successMsg]);
        exit;
    }
    $_SESSION['flash_success'] = $successMsg;
} else {
    $errorMsg = 'Failed to update details: ' . $updateStmt->error;
    $updateStmt->close();
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['status' => false, 'message' => $errorMsg]);
        exit;
    }
    $_SESSION['flash_error'] = $errorMsg;
}

header('Location: ../profile.php');
exit;
?>
