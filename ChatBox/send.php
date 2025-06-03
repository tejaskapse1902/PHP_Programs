<?php
if (isset($_POST['user']) && isset($_POST['message'])) {
    $user = strip_tags($_POST['user']);
    $msg = strip_tags($_POST['message']);

    $formatted = json_encode([
        "user" => $user,
        "message" => $msg,
        "time" => time()
    ]) . "\n";

    file_put_contents("messages.txt", $formatted, FILE_APPEND);
}
?>
