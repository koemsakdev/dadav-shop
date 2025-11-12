<?php
// Database configuration
const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASS = "";
const DB_NAME = "dadavstore";

function db()
{
    static $conn;
    if ($conn instanceof mysqli) {
        return $conn;
    }

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($conn->connect_error) {
        die("Database connection failed: {$conn->connect_error}");
    }

    if (!$conn->set_charset("utf8")) {
        die("Error loading character set utf8: {$conn->error}");
    }

    return $conn;
}

function fetchQuery($sql, $params = [], $types = "")
{
    $conn = db();
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: {$conn->error}");
    }

    if (!empty($params)) {
        $stmt->bind_param($types ?: str_repeat("s", count($params)), ...$params);
    }

    if (!$stmt->execute()) {
        die("Query failed: {$stmt->error}");
    }

    $result = $stmt->get_result();
    return $result ? $result->fetch_all(MYSQLI_ASSOC) : ($conn->insert_id ?: $stmt->affected_rows);
}

function getProducts($limit = 4, $category = null)
{
    $sql = "SELECT * FROM products";
    $params = [];
    if ($category) {
        $sql .= " WHERE product_category = ?";
        $params[] = $category;
    }
    $sql .= " LIMIT ?";
    $params[] = $limit;

    return fetchQuery($sql, $params, str_repeat("s", count($params) - 1) . "i");
}


function getProductById($id)
{
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $params = [$id];
    return fetchQuery($sql, $params, "s");
}

// Function to insert order into the database
function insertOrder($data)
{
    $sql = "INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_city, user_address, order_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $params = [$data['order_cost'], $data['order_status'], $data['user_id'], $data['user_phone'], $data['user_city'], $data['user_address'], $data['order_date']];
    return fetchQuery($sql, $params, str_repeat("s", count($params)));
}

// Function to insert order items into the database
function insertOrderItems($data)
{
    $sql = "INSERT INTO order_items (order_id, product_id, product_name, product_image, product_price, product_quantity, user_id, order_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $params = [$data['order_id'], $data['product_id'], $data['product_name'], $data['product_image'], $data['product_price'], $data['product_quantity'], $data['user_id'], $data['order_date']];
    return fetchQuery($sql, $params, str_repeat("s", count($params)));
}

// Function to get order by id
function getOrderById($id)
{
    $sql = "SELECT * FROM orders WHERE order_id = ?";
    $params = [$id];
    return fetchQuery($sql, $params, "s");
}

// Function to register user
function registerUser($data)
{
    $sql = "INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)";
    $params = [$data['user_name'], $data['user_email'], $data['user_password']];
    return fetchQuery($sql, $params, str_repeat("s", count($params)));
}

// Function to check if user exists
function checkUserExists($email)
{
    $sql = "SELECT * FROM users WHERE user_email = ?";
    $params = [$email];
    return fetchQuery($sql, $params, "s");
}

// Function to get user by email
function getUserByEmail($email)
{
    $sql = "SELECT * FROM users WHERE user_email = ?";
    $params = [$email];
    return fetchQuery($sql, $params, "s");
}

// Function login user by email
function loginUserByEmail($email, $password)
{
    $sql = "SELECT * FROM users WHERE user_email = ?";
    $params = [$email];
    $userResult = fetchQuery($sql, $params, "s");

    if (empty($userResult)) {
        return false; // user not found
    }

    $user = $userResult[0];

    if (password_verify($password, $user["user_password"])) {
        return $user; // login success
    } else {
        return false; // wrong password
    }
}
