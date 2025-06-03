<?php
$currentUser = $_GET['currentUser'] ?? 'User1';

if (!file_exists("messages.txt")) {
    echo "<div>No messages yet.</div>";
    exit;
}

$lines = file("messages.txt", FILE_IGNORE_NEW_LINES);
$output = "";

foreach ($lines as $line) {
    $data = json_decode($line, true);
    if (!$data) continue;

    $class = ($data['user'] === $currentUser) ? "sent" : "received";
    $user = $data['user'] === 'User1'?'Rakshak':'Tejas';
    $output .= "<div class='message $class'><strong>" . $user . ":</strong> " . 
    htmlspecialchars($data['message']) . "</div>";
}

echo $output;
?>
