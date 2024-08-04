<?php
include("connexion.php");
if (isset($_POST['email']) && !empty($_POST['email'])) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $sql = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query($conn, $sql);
    $tab = mysqli_fetch_assoc($query);

    if (!empty($tab)) {
        $token = bin2hex(random_bytes(16));
        $token_creation_time = date("Y-m-d H:i:s");
        $id_user = $tab['id_user'];
        $fname = $tab['Fname'];

        $sql2 = "SELECT * FROM Tokens WHERE id_user='{$tab['id_user']}'";
        $query2 = mysqli_query($conn, $sql2);
        $tab2 = mysqli_fetch_assoc($query2);
        if (empty($tab2)) {
            $sql3 = "INSERT INTO Tokens VALUES('$token', '$token_creation_time', $id_user)";
        } else {
            $sql3 = "UPDATE Tokens SET token='$token',token_creation_time='$token_creation_time' WHERE id_user='{$tab['id_user']}'";
        }
        mysqli_query($conn, $sql3);

        $fileContent = file_get_contents("../Static/PR_email_body.txt");
        $fileContent = str_replace("[User]", $fname, $fileContent);
        $fileContent = str_replace("[Password Reset Link]", "http://localhost/todo_list/PHP/password_reset.php?token=$token", $fileContent);

        $to = $email;
        $subject = "Password reset";
        $body = $fileContent;
        $header = "Content-Type: text/html; charset=UTF-8";
        if (mail($to, $subject, $body, $header)) {
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 2;
    }
}
