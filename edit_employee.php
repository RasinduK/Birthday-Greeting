<?php
include 'db_conn.php';
session_start();

$response = [
    'status' => '',
    'message' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $birthday = $_POST['birthday'] ?? '';
    $photo = $_FILES['photo']['name'] ?? '';
    $user_id = $_SESSION['id']; // Get the user ID from the session
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo);

    // Basic validation
    if (empty($name) || empty($phone) || empty($email) || empty($birthday)) {
        $response['status'] = 'error';
        $response['message'] = 'All fields except photo are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['status'] = 'error';
        $response['message'] = 'Invalid email format.';
    } else {
        // Handle photo upload
        if (!empty($photo) && !move_uploaded_file($_FILES['photo']['tmp_name'], $target_file)) {
            $response['status'] = 'error';
            $response['message'] = 'Sorry, there was an error uploading your file.';
        } else {
            $query = "UPDATE employees SET name=?, phone=?, email=?, birthday=?";
            $params = [$name, $phone, $email, $birthday];

            // Add photo to update query if a new photo is provided
            if (!empty($photo)) {
                $query .= ", photo=?";
                $params[] = $target_file;
            }

            $query .= " WHERE id=? AND user_id=?";
            $params[] = $id;
            $params[] = $user_id;

            // Prepare and bind
            $stmt = $conn->prepare($query);
            if ($stmt === false) {
                $response['status'] = 'error';
                $response['message'] = 'Database error: ' . $conn->error;
            } else {
                $stmt->bind_param(str_repeat('s', count($params) - 2) . 'ii', ...$params);

                // Execute the statement
                if ($stmt->execute()) {
                    $response['status'] = 'success';
                    $response['message'] = 'Employee details updated successfully.';
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Database error: ' . $stmt->error;
                }
                $stmt->close();
            }
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
