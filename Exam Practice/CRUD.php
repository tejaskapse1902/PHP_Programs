<?php
// --------------------------------------------------
// 1. Database Connection and Table Creation
// --------------------------------------------------
$servername = "localhost";
$username   = "your_mysql_user";
$password   = "your_mysql_password";
$dbname     = "testdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$createTableSQL = "
    CREATE TABLE IF NOT EXISTS employee (
        id           INT AUTO_INCREMENT PRIMARY KEY,
        name         VARCHAR(100) NOT NULL,
        designation  VARCHAR(100) NOT NULL,
        city         VARCHAR(100) NOT NULL,
        salary       DECIMAL(10,2) NOT NULL
    ) ENGINE=InnoDB;
";

if (mysqli_query($conn, $createTableSQL)) {
    echo "Table `employee` is ready.<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

// --------------------------------------------------
// 2. CREATE: Insert Employees
// --------------------------------------------------
function insertEmployee($conn, $name, $designation, $city, $salary) {
    $sql = "INSERT INTO employee (name, designation, city, salary) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssd", $name, $designation, $city, $salary);
    if (mysqli_stmt_execute($stmt)) {
        echo "Inserted employee: $name <br>";
    } else {
        echo "Error inserting employee: " . mysqli_error($conn) . "<br>";
    }
    mysqli_stmt_close($stmt);
}

// Example inserts (run once; comment out after first run to avoid duplicates)
insertEmployee($conn, "Alice Kumar",   "Developer", "Pune",  45000.00);
insertEmployee($conn, "Ravi Sharma",   "Manager",   "Mumbai", 55000.00);
insertEmployee($conn, "Neha Deshmukh","Tester",    "Pune",  30000.00);

// --------------------------------------------------
// 3. READ: Fetch Employees
// --------------------------------------------------
function fetchAllEmployees($conn) {
    $sql = "SELECT * FROM employee";
    $result = mysqli_query($conn, $sql);

    echo "<h3>All Employees:</h3>";
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='5' cellspacing='0'>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>City</th>
                  <th>Salary</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['designation']}</td>
                    <td>{$row['city']}</td>
                    <td>{$row['salary']}</td>
                  </tr>";
        }
        echo "</table><br>";
    } else {
        echo "No employees found.<br>";
    }
}

function fetchEmployeeById($conn, $id) {
    $sql  = "SELECT * FROM employee WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    echo "<h3>Employee with ID = $id:</h3>";
    if ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Name: " . $row['name'] . "<br>";
        echo "Designation: " . $row['designation'] . "<br>";
        echo "City: " . $row['city'] . "<br>";
        echo "Salary: " . $row['salary'] . "<br><br>";
    } else {
        echo "No employee with ID = $id found.<br><br>";
    }
    mysqli_stmt_close($stmt);
}

// Display all employees
fetchAllEmployees($conn);

// Display employee with ID = 2
fetchEmployeeById($conn, 2);

// --------------------------------------------------
// 4. UPDATE: Modify an Employee
// --------------------------------------------------
function updateEmployee($conn, $id, $newDesignation, $newCity, $newSalary) {
    $sql  = "UPDATE employee SET designation = ?, city = ?, salary = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssdi", $newDesignation, $newCity, $newSalary, $id);

    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Employee ID $id updated successfully.<br>";
        } else {
            echo "No changes made or employee ID $id not found.<br>";
        }
    } else {
        echo "Error updating employee: " . mysqli_error($conn) . "<br>";
    }
    mysqli_stmt_close($stmt);
}

// Example: Update employee with ID = 1
updateEmployee($conn, 1, "Senior Developer", "Pune", 50000.00);

// --------------------------------------------------
// 5. DELETE: Remove an Employee
// --------------------------------------------------
function deleteEmployee($conn, $id) {
    $sql  = "DELETE FROM employee WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Employee ID $id deleted successfully.<br>";
        } else {
            echo "Employee ID $id not found.<br>";
        }
    } else {
        echo "Error deleting employee: " . mysqli_error($conn) . "<br>";
    }
    mysqli_stmt_close($stmt);
}

// Example: Delete employee with ID = 3
deleteEmployee($conn, 3);

// --------------------------------------------------
// 6. Special Queries
// --------------------------------------------------
function fetchEmployeesByCity($conn, $city) {
    $sql  = "SELECT * FROM employee WHERE city = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $city);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    echo "<h3>Employees in City: $city</h3>";
    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>
                    [ID: {$row['id']}] {$row['name']} – {$row['designation']}, Salary: {$row['salary']}
                  </li>";
        }
        echo "</ul><br>";
    } else {
        echo "No employees found in $city.<br><br>";
    }
    mysqli_stmt_close($stmt);
}

function fetchEmployeesBySalaryGreater($conn, $minSalary) {
    $sql  = "SELECT * FROM employee WHERE salary > ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "d", $minSalary);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    echo "<h3>Employees with Salary > $minSalary</h3>";
    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>
                    [ID: {$row['id']}] {$row['name']} – {$row['designation']}, City: {$row['city']}, Salary: {$row['salary']}
                  </li>";
        }
        echo "</ul><br>";
    } else {
        echo "No employees found with salary > $minSalary.<br><br>";
    }
    mysqli_stmt_close($stmt);
}

// Fetch employees in Pune
fetchEmployeesByCity($conn, "Pune");

// Fetch employees with salary > 35000
fetchEmployeesBySalaryGreater($conn, 35000.00);

// --------------------------------------------------
// 7. Close the connection
// --------------------------------------------------
mysqli_close($conn);
?>