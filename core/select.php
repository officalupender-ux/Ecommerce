<?php
require_once __DIR__ . '/../config/database.php';

/**
 * Fetch all products or filtered products
 */
function get_all_products($conn, $limit = 12) {
    $products = [];
    $query = "SELECT * FROM `products` ORDER BY `id` DESC LIMIT ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($row = $res->fetch_assoc()) {
            $products[] = $row;
        }
        $stmt->close();
    }
    return $products;
}
?>
