<?php
include 'db_conn.php';
session_start();

$response = [
    'status' => '',
    'message' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $birthday = $_POST['birthday'] ?? '';
    $photo = $_FILES['photo']['name'] ?? '';
    $user_id = $_SESSION['id']; // Get the user ID from the session
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo);

    // Basic validation
    if (empty($name) || empty($phone) || empty($email) || empty($birthday) || empty($photo)) {
        $response['status'] = 'error';
        $response['message'] = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['status'] = 'error';
        $response['message'] = 'Invalid email format.';
    } elseif (!move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
        $response['status'] = 'error';
        $response['message'] = 'Sorry, there was an error uploading your file.';
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO employees (name, phone, email, birthday, photo, user_id) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            $response['status'] = 'error';
            $response['message'] = 'Database error: ' . $conn->error;
        } else {
            $stmt->bind_param("sssssi", $name, $phone, $email, $birthday, $target_file, $user_id);

            // Execute the statement
            if ($stmt->execute()) {
                $response['status'] = 'success';
                $response['message'] = 'New employee added successfully.';
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Database error: ' . $stmt->error;
            }
            $stmt->close();
        }
    }
    $conn->close();
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

// Return response (for example, as JSON for an AJAX request)
echo json_encode($response);
?>
