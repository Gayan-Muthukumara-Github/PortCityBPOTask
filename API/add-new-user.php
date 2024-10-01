<?php
$data = json_decode(file_get_contents("php://input"));
$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $data->name);
$stmt->bindParam(':email', $data->email);
if ($stmt->execute()) {
    echo json_encode(['message' => 'User created successfully']);
} else {
    http_response_code(500);
    echo json_encode(['message' => 'User creation failed']);
}
?>
