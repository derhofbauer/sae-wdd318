<?php

var_dump($_POST); // Testzwecke

if (isset($_POST['do-submit'])) {
    if (strlen($_POST['name']) < 2) {
        echo "<p>Bitte einen längeren Namen eingeben</p>";
    }

    if (strpos($_POST['email'], '@') < 1) {
        echo "<p>Whaaat? wo is das @?</p>";
    }

    if (
        strpos($_POST['email'], '.') > strlen($_POST['email']) - 1 ||
        strpos($_POST['email'], '.', strpos($_POST['email'], '@')) < 2
    ) {
        echo "<p>ok, wow, dein ernst?!</p>";
    }

    if ($_POST['salutation'] === 'default') {
        echo "<p>Bitte wählen Sie eine Andrede.</p>";
    }

    if (!isset($_POST['gender']) || empty($_POST['gender'])) {
        echo "<p>Bitte wählen Sie ein Geschlecht.</p>";
    }

    $message = trim($_POST['message']);
    if (strlen($message) < 10 ) {
        echo "<p>Das ist keine vernünftige Nachricht!!!</p>";
    }

    if (isset($_POST['newsletter']) && $_POST['newsletter'] === 'on') {
        echo "<p>Herzlich Wilkommen zu unserem Newsletter!</p>";
        // Newsletter Anmeldung durchführen, etc.
    }
}

?>

<form action="index.php?page=contact" method="post">
    <div class="form-group">
        <label for="salutation">Anrede</label>
        <select name="salutation" id="salutation" class="form-control">
            <option value="default">Bitte wählen...</option>
            <option value="1">Frau</option>
            <option value="2">Herr</option>
        </select>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label><input type="radio" value="female" name="gender" id="gender_female"> weiblich</label>
        <label><input type="radio" value="male" name="gender" id="gender_male"> männlich</label>
    </div>
    <div class="form-group">
        <label for="message">Nachricht</label>
        <textarea name="message" id="message" class="form-control" placeholder="Tiefsinnige Nachricht ..."></textarea>
    </div>
    <div class="form-group">
        <label>
            <input type="checkbox" name="newsletter" id="newsletter"> Ich möchte den Newsletter abonieren.
        </label>
    </div>
    <div class="form-group">
        <input type="submit" name="do-submit" value="Anfrage absenden" class="btn btn-primary">
    </div>
</form>