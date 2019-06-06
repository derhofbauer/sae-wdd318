<?php require_once __DIR__ . '/../../Partials/Header.php'; ?>
    <div class="container">

        <form method="post">
            <div class="form-group">
                <label for="existing_address">vorhande Adresse wählen</label>
                <select name="existing_address" id="existing_address" class="form-control">
                    <option value="default">Bitte auswählen ... (optional)</option>
                    <?php foreach ($addresses as $address): ?>
                        <option value="<?php echo $address->id; ?>">
                            <?php echo "{$address->name}: {$address->street} {$address->streetNr}"; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <h2>Neue Adresse</h2>
            <div class="form-group">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="street">Straße</label>
                    <input type="text" class="form-control" id="street" name="street" required>
                </div>
                <div class="form-group">
                    <label for="streetNr">Hausnummer</label>
                    <input type="text" class="form-control" id="streetNr" name="streetNr" required>
                </div>
                <div class="form-group">
                    <label for="door">Türnummer</label>
                    <input type="text" class="form-control" id="door" name="door">
                </div>
                <div class="form-group">
                    <label for="zip">ZIP</label>
                    <input type="text" class="form-control" id="zip" name="zip" required>
                </div>
                <div class="form-group">
                    <label for="city">Stadt</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>
                <div class="form-group">
                    <label for="country">Land</label>
                    <select class="form-control" id="country" name="country" required>
                        <?php foreach (Countries::$countries as $abbr => $country): ?>
                            <option value="<?php echo $abbr; ?>"><?php echo $country; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Speichern</button>
                </div>
            </div>
        </form>

    </div>
<?php require_once __DIR__ . '/../../Partials/Footer.php'; ?>