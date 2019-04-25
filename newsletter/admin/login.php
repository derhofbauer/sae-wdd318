<?php

require_once '../dbconnect.php';

if (isset($_POST) && isset($_POST['email']) && isset($_POST['password'])) {
    // überprüfung & login
    
    // gibts einen user mit der mail adresse bereits?
    $stmt = mysqli_stmt_init($link);
    mysqli_stmt_prepare($stmt, "SELECT id,count(*) as count,is_admin,password FROM users WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $_POST['email']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    $user_id = $row['id'];
    mysqli_stmt_close($stmt);

    if ($count === 1 && $row['is_admin'] === 1) {
        // passwort prüfen
        if (password_verify($_POST['password'], $row['password'])) {
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $row['id'];

            header('Location: index.php');
            exit; // nicht nötig, alles was danach kommt, muss nicht mehr ausgeführt werden
        }

    }
} else {
    // nicht eingeloggt
    echo "geh bitte, oida";
}

require_once '../dbclose.php';

?>