<?php
$customerName = "";
$upperCaseName = "";
$firstCharUpper = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $customerName = $_POST['name'];

    // a) Transform to all uppercase
    $upperCaseName = strtoupper($customerName);

    // b) Make first character uppercase, rest lowercase
    $firstCharUpper = ucwords(strtolower($customerName));
}
?>

<!-- HTML Form -->
<form method="post">
    Enter Customer Name: <input type="text" name="name" required>
    <input type="submit" value="Transform">
</form>

<?php
if (!empty($customerName)) {
    echo "<h3>Results:</h3>";
    echo "Original Name: " . htmlspecialchars($customerName) . "<br>";
    echo "All Uppercase: " . $upperCaseName . "<br>";
    echo "First Letter Uppercase: " . $firstCharUpper;
}
?>
