<?php
session_start();
include 'db_conn.php';

$response = [];

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    
    $stmt = $conn->prepare("SELECT id, name, phone, email, birthday, photo FROM employees WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $response[] = $row;
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Database error: ' . $stmt->error;
    }
    
    $stmt->close();
} else {
    $response['status'] = 'error';
    $response['message'] = 'User not logged in.';
}

$conn->close();

// Return response (for example, as JSON for an AJAX request)
echo json_encode($response);
?>
