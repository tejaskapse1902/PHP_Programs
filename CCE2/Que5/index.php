<?php
include 'db.php';

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $city = $_POST['city'];
        $salary = $_POST['salary'];

        $sql = "INSERT INTO employees (name, designation, city, salary) VALUES ('$name', '$designation', '$city', '$salary')";
        $conn->query($sql);
    } elseif (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $city = $_POST['city'];
        $salary = $_POST['salary'];

        $sql = "UPDATE employees SET name='$name', designation='$designation', city='$city', salary='$salary' WHERE id='$id'";
        $conn->query($sql);
    } elseif (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM employees WHERE id='$id'";
        $conn->query($sql);
    }
}

// Fetch employees
$employees = $conn->query("SELECT * FROM employees");

// Fetch filtered employees
$pune_employees = $conn->query("SELECT * FROM employees WHERE city = 'Pune'");
$high_salary_employees = $conn->query("SELECT * FROM employees WHERE salary > 35000");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h2>Add Employee</h2>
    <form method="post">
        Name: <input type="text" name="name" required>
        Designation: <input type="text" name="designation" required>
        City: <input type="text" name="city" required>
        Salary: <input type="number" name="salary" required>
        <button type="submit" name="add">Add Employee</button>
    </form>

    <h2>All Employees</h2>
    <table class="table">
        <tr>
            <th>ID</th><th>Name</th><th>Designation</th><th>City</th><th>Salary</th><th>Actions</th>
        </tr>
        <?php while ($row = $employees->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['designation'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['salary'] ?></td>
                <td>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="text" name="name" value="<?= $row['name'] ?>" required>
                        <input type="text" name="designation" value="<?= $row['designation'] ?>" required>
                        <input type="text" name="city" value="<?= $row['city'] ?>" required>
                        <input type="number" name="salary" value="<?= $row['salary'] ?>" required>
                        <button type="submit" name="update">Update</button>
                    </form>

                    <form method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <button type="submit" name="delete">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <h2>Employees in Pune</h2>
    <table class="table table-primary">
        <tr><th>ID</th><th>Name</th><th>Designation</th><th>City</th><th>Salary</th></tr>
        <?php while ($row = $pune_employees->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['designation'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['salary'] ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Employees with Salary > 35000</h2>
    <table border="1">
        <tr><th>ID</th><th>Name</th><th>Designation</th><th>City</th><th>Salary</th></tr>
        <?php while ($row = $high_salary_employees->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['designation'] ?></td>
                <td><?= $row['city'] ?></td>
                <td><?= $row['salary'] ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
