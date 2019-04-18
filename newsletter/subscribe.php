<?php

/*
array(3) {
  ["email"]=>
  string(28) "hofbauer.alexander@gmail.com"
  ["topic-1"]=>
  string(1) "1"
  ["topic-2"]=>
  string(1) "2"
}
 */

var_dump($_POST);

$email = $_POST['email'];
$topics = [];

// gibts einen user mit der mail adresse bereits?
$stmt = mysqli_stmt_init($link);
mysqli_stmt_prepare($stmt, "SELECT id,count(*) as count FROM users WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$count = mysqli_fetch_assoc($result)['count'];

if ($count < 1) { // wenn es weniger als einen User mit der Email adresse gibt
    // user anlegen
    $stmt = mysqli_stmt_init($link);
    mysqli_stmt_prepare($stmt, "INSERT INTO users set email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
}

// in jedem fall: aktualisiere die abos

// alle abos zu dem user löschen

// neue abos setzen

// get topic ids
$stmt = mysqli_stmt_init($link);
$sql = "SELECT id FROM topics;";
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    $topics[] = (int)$row['id'];
}

foreach ($topics as $id) {
    if (isset($_GET["topic-$id"]) && $_GET["topic-$id"] == $id) {
        // store to db
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