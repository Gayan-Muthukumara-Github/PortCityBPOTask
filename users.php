<?php
require_once __DIR__ . '/db.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            require_once __DIR__ . '/API/get-user-by-id.php';
        } else {
            require_once __DIR__ . '/API/get-all-users.php';
        }
        break;
    case 'POST':
        require_once __DIR__ . '/API/add-new-user.php';
        break;

    case 'PUT':
        require_once __DIR__ . '/API/update-user.php';
        break;

    case 'DELETE':
        require_once __DIR__ . '/API/delete-user.php';
        break;

    default:
        http_response_code(405);
        echo json_encode(['message' => 'Method not allowed']);
        break;
}
?>
