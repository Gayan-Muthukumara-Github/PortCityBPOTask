<?php

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();


$user = $stmt->fetch(PDO::FETCH_ASSOC);


if ($user) {
    echo json_encode($user);
} else {
    http_response_code(404);
    echo json_encode(['message' => 'User not found']);
}
?>
