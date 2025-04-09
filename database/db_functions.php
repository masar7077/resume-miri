<?php
include("config.php"); // اتصال به پایگاه داده

// =========================
// افزودن مقاله جدید
// =========================
function addPost($title, $content) {
    global $conn;
    $query = "INSERT INTO blog (title, content, created_at) VALUES ('$title', '$content', NOW())";
    return mysqli_query($conn, $query);
}

// =========================
// دریافت لیست مقالات
// =========================
function getPosts() {
    global $conn;
    $query = "SELECT * FROM blog ORDER BY created_at DESC";
    return mysqli_query($conn, $query);
}

// =========================
// دریافت یک مقاله خاص
// =========================
function getPostById($id) {
    global $conn;
    $query = "SELECT * FROM blog WHERE id = $id";
    return mysqli_query($conn, $query);
}

// =========================
// حذف مقاله
// =========================
function deletePost($id) {
    global $conn;
    $query = "DELETE FROM blog WHERE id = $id";
    return mysqli_query($conn, $query);
}

// =========================
// ذخیره پیام‌های فرم تماس
// =========================
function saveContactMessage($name, $email, $message) {
    global $conn;
    $query = "INSERT INTO contact_messages (name, email, message, sent_at) VALUES ('$name', '$email', '$message', NOW())";
    return mysqli_query($conn, $query);
}

// =========================
// دریافت پیام‌های فرم تماس
// =========================
function getContactMessages() {
    global $conn;
    $query = "SELECT * FROM contact_messages ORDER BY sent_at DESC";
    return mysqli_query($conn, $query);
}
?>