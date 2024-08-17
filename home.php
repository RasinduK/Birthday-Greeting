<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Birthday Greetings Web App</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function showModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        function submitForm(event) {
            event.preventDefault();
            const form = document.getElementById('employeeForm');
            const formData = new FormData(form);

            fetch('add_employee.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const message = document.getElementById('message');
                message.innerText = data.message;
                message.className = data.status;
                if (data.status === 'success') {
                    form.reset();
                    closeModal('addEmployeeModal');
                }
            })
            .catch(error => {
                const message = document.getElementById('message');
                message.innerText = 'An error occurred: ' + error.message;
                message.className = 'error';
            });
        }

        function fetchEmployees() {
            fetch('view_employees.php')
            .then(response => response.json())
            .then(data => {
                const employeeTable = document.getElementById('employeeTable');
                employeeTable.innerHTML = '';
                data.forEach(employee => {
                    const row = `
                        <tr>
                            <td>${employee.name}</td>
                            <td>${employee.phone}</td>
                            <td>${employee.email}</td>
                            <td>${employee.birthday}</td>
                            <td><img src="${employee.photo}" alt="${employee.name}" width="50"></td>
                            <td>
                                <button onclick="editEmployee(${employee.id})">Edit</button>
                                <button onclick="deleteEmployee(${employee.id})">Delete</button>
                            </td>
                        </tr>`;
                    employeeTable.innerHTML += row;
                });
                showModal('viewEmployeesModal');
            })
            .catch(error => console.error('Error fetching employees:', error));
        }

        // JavaScript function to edit an employee
        function editEmployee(id) {
            console.log('Delete button clicked for employee ID:', id);
            fetch('view_employees.php')
            .then(response => response.json())
            .then(data => {
                const employee = data.find(emp => emp.id == id);
                if (employee) {
                    document.getElementById('edit_id').value = employee.id;
                    document.getElementById('edit_name').value = employee.name;
                    document.getElementById('edit_phone').value = employee.phone;
                    document.getElementById('edit_email').value = employee.email;
                    document.getElementById('edit_birthday').value = employee.birthday;
                    showModal('editEmployeeModal');
                }
            })
            .catch(error => console.error('Error fetching employee details:', error));
        }

        function submitEditForm(event) {
            event.preventDefault();
            const form = document.getElementById('editEmployeeForm');
            const formData = new FormData(form);

            fetch('edit_employee.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const message = document.getElementById('edit_message');
                message.innerText = data.message;
                message.className = data.status;
                if (data.status === 'success') {
                    form.reset();
                    closeModal('editEmployeeModal');
                    fetchEmployees();
                }
            })
            .catch(error => {
                const message = document.getElementById('edit_message');
                message.innerText = 'An error occurred: ' + error.message;
                message.className = 'error';
            });
        }

        // JavaScript function to delete an employee
        function deleteEmployee(id) {
    if (confirm('Are you sure you want to delete this employee?')) {
        fetch('delete_employee.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id }) // Include ID parameter here
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.status === 'success') {
                fetchEmployees();
            }
        })
        .catch(error => console.error('Error deleting employee:', error));
    }
}

    </script>
</head>
<body>
    <header>
        <nav class="simple-nav">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="send_birthday_emails.php">Sent Emails</a></li>
                <li><a href="logout.php">Logout</a></li>
                
            </ul>
        </nav>
    </header>
<h1>Welcome To BirthDay Gretings</h1>

    <main>
        <section class="actions">
    <div class="card">
        <img src="icons/add_icon.png" alt="Add Recoard">
        <h2>Add Recoard</h2>
        <button onclick="showModal('addEmployeeModal')">Access Now</button>
    </div>
    <div class="card">
            <img src="icons/view_icon.png" alt="View Record">
            <h2>View Record</h2>
            <button onclick="fetchEmployees()">Access Now</button>
    </div>
        </section>

        <!-- Add Employee Modal -->
        <div id="addEmployeeModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('addEmployeeModal')">&times;</span>
                <h2>Add Employee Details</h2>
                <form id="employeeForm" onsubmit="submitForm(event)">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="birthday">Birthday:</label>
                    <input type="date" id="birthday" name="birthday" required>

                    <label for="photo">Photo:</label>
                    <input type="file" id="photo" name="photo" required>

                    <button type="submit">Add Employee</button>
                </form>
                <p id="message"></p>
            </div>
        </div>

        <!-- Edit Employee Modal -->
        <div id="editEmployeeModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('editEmployeeModal')">&times;</span>
                <h2>Edit Employee Details</h2>
                <form id="editEmployeeForm" onsubmit="submitEditForm(event)">
                    <input type="hidden" id="edit_id" name="id">

                    <label for="edit_name">Name:</label>
                    <input type="text" id="edit_name" name="name" required>

                    <label for="edit_phone">Phone:</label>
                    <input type="text" id="edit_phone" name="phone" required>

                    <label for="edit_email">Email:</label>
                    <input type="email" id="edit_email" name="email" required>

                    <label for="edit_birthday">Birthday:</label>
                    <input type="date" id="edit_birthday" name="birthday" required>

                    <label for="edit_photo">Photo:</label>
                    <input type="file" id="edit_photo" name="photo">

                    <button type="submit">Update Employee</button>
                </form>
                <p id="edit_message"></p>
            </div>
        </div>

        <!-- View Employees Modal -->
        <div id="viewEmployeesModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('viewEmployeesModal')">&times;</span>
                <h2>Employees List</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Birthday</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="employeeTable">
                        <!-- Table rows will be dynamically generated here -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="welcome-message">
    <p>We're excited to help you celebrate and share the joy of birthdays with your loved ones. Login or sign up to create personalized birthday greetings and make every birthday special!</p>
</div>
    </main>

    <footer>
        <p>&copy; 2024 Birthday Greetings Web App. All rights reserved.</p>
    </footer>
</body>
</html>
<?php 
} else {
    header("Location: index.php");
    exit();
}
?>
