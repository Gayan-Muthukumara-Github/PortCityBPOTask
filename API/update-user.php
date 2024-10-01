<?php
$data = json_decode(file_get_contents("php://input"));
$sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $data->name);
$stmt->bindParam(':email', $data->email);
$stmt->bindParam(':id', $data->id);
if ($stmt->execute()) {
    echo json_encode(['message' => 'User updated successfully']);
} else {
    http_response_code(500);
    echo json_encode(['message' => 'User update failed']);
}
?>
