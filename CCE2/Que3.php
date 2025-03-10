<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerName = $_POST["customer_name"];

    $upperCaseName = strtoupper($customerName);

    $titleCaseName = ucwords(strtolower($customerName));

    echo "<h3>Results:</h3>";
    echo "Original Name: " . $customerName . "<br>";
    echo "All Uppercase: " . $upperCaseName . "<br>";
    echo "Title Case (First Letter Uppercase): " . $titleCaseName . "<br>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Name Transformation</title>
</head>
<body>
    <h2>Enter Customer Name</h2>
    <form method="post">
        <input type="text" name="customer_name" placeholder="Enter Name" required>
        <button type="submit">Transform</button>
    </form>
</body>
</html>
