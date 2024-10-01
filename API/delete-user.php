<?php
$data = json_decode(file_get_contents("php://input"));
$sql = "DELETE FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $data->id);
if ($stmt->execute()) {
    echo json_encode(['message' => 'User deleted successfully']);
} else {
    http_response_code(500);
    echo json_encode(['message' => 'User deletion failed']);
}
?>
