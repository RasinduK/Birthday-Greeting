<?php
// Check if request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if id parameter is set
    if (isset($_POST['id'])) {
        // Include database connection file
        include_once "db_conn.php";

        // Escape user inputs for security
        $id = mysqli_real_escape_string($conn, $_POST['id']);

        // Attempt to delete employee from the database
        $sql = "DELETE FROM employees WHERE id = '$id'";
        if (mysqli_query($conn, $sql)) {
            // If deletion is successful, return success message
            $response = array(
                'status' => 'success',
                'message' => 'Employee deleted successfully.'
            );
            echo json_encode($response);
        } else {
            // If deletion fails, return error message
            $response = array(
                'status' => 'error',
                'message' => 'Error deleting employee: ' . mysqli_error($conn)
            );
            echo json_encode($response);
        }

        // Close database connection
        mysqli_close($conn);
    } else {
        // If id parameter is not set, return error message
        $response = array(
            'status' => 'error',
            'message' => 'ID parameter is missing.'
        );
        echo json_encode($response);
    }
} else {
    // If request method is not POST, return error message
    $response = array(
        'status' => 'error',
        'message' => 'Invalid request method.'
    );
    echo json_encode($response);
}
?>
