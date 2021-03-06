<?php

$email = $_POST['email'];
$topics = [];
$success = false;

// gibts einen user mit der mail adresse bereits?
// $stmt = mysqli_stmt_init($link);
// mysqli_stmt_prepare($stmt, "SELECT id,count(*) as count FROM users WHERE email = ?");
// mysqli_stmt_bind_param($stmt, "s", $email);
// mysqli_stmt_execute($stmt);
// $result = mysqli_stmt_get_result($stmt);
// $row = mysqli_fetch_assoc($result);
// $count = $row['count'];
// $user_id = $row['id'];
// mysqli_stmt_close($stmt);

$result = $db->query("SELECT id,count(*) as count FROM users WHERE email = ?", [
    's:email' => $email
]);
$count = $result[0]['count'];
$user_id = $result[0]['id'];

if ($count < 1) { // wenn es weniger als einen User mit der Email adresse gibt
    // user anlegen
    // $stmt = mysqli_stmt_init($link);
    // mysqli_stmt_prepare($stmt, "INSERT INTO users set email = ?");
    // mysqli_stmt_bind_param($stmt, "s", $email);
    // mysqli_stmt_execute($stmt);
    $db->query("INSERT INTO users set email = ?", ['s:email' => $email]);

    // mysqli_stmt_prepare($stmt, "SELECT id FROM users WHERE email = ?");
    // mysqli_stmt_bind_param($stmt, "s", $email);
    // mysqli_stmt_execute($stmt);
    // $result = mysqli_stmt_get_result($stmt);
    // $row = mysqli_fetch_assoc($result);
    // $user_id = $row['id'];
    // mysqli_stmt_close($stmt);

    $result = $db->query("SELECT id FROM users WHERE email = ?", ['s:email' => $email]);
    $user_id = $result[0]['id'];
}

// in jedem fall: aktualisiere die abos

// alle abos zu dem user löschen
// $stmt = mysqli_stmt_init($link);
// mysqli_stmt_prepare($stmt, "DELETE FROM abos WHERE user_id = ?");
// mysqli_stmt_bind_param($stmt, "i", $user_id);
// mysqli_stmt_execute($stmt);
// mysqli_stmt_close($stmt);
$db->query("DELETE FROM abos WHERE user_id = ?", [
    'i:id' => $user_id
]);

// get topic ids
// $stmt = mysqli_stmt_init($link);
// $sql = "SELECT id FROM topics;";
// mysqli_stmt_prepare($stmt, $sql);
// mysqli_stmt_execute($stmt);
// $result = mysqli_stmt_get_result($stmt);

$result = $db->query("SELECT id FROM topics;");

foreach ($result as $topic) {
    $topics[] = (int)$topic['id'];
}

foreach ($topics as $id) {
    if (isset($_POST["topic-$id"]) && $_POST["topic-$id"] == $id) {
        // $stmt = mysqli_stmt_init($link);
        // mysqli_stmt_prepare($stmt, "INSERT INTO abos set topic_id = ?, user_id = ?");
        // mysqli_stmt_bind_param($stmt, "ii", $id, $user_id);
        // mysqli_stmt_execute($stmt);
        // mysqli_stmt_close($stmt);

        $db->query("INSERT INTO abos set topic_id = ?, user_id = ?", [
            'i:topic_id' => $id,
            'i:user_id' => $user_id
        ]);

        $success = true;
    }
}

/**
 * + Daten aus dem Formular entgegennehmen ($_POST)
 * + Daten "validieren"
 * + SQL Statement vorbereiten
 * + SQL Statement abschicken
 * + Erfolgsmeldung ausgeben
 */


// https://www.php.net/manual/en/mysqli-stmt.prepare.php

?>
