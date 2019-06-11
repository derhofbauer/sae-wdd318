<?php require_once __DIR__ . '/../../Partials/Header.php'; ?>
    <div class="container">

        <form method="post">
            <div class="form-group">
                <label for="existing_payment">vorhande Zahlungsmethode wählen</label>
                <select name="existing_payment" id="existing_payment" class="form-control">
                    <option value="default">Bitte auswählen ... (optional)</option>
                    <?php foreach ($payments as $payment): ?>
                        <option value="<?php echo $payment->id; ?>">
                            <?php echo "{$payment->name}: {$payment->number}"; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <h2>Neue Zahlungsmethode</h2>
            <div class="form-group">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="number">Number</label>
                    <input type="text" class="form-control" id="number" name="number">
                </div>
                <div class="form-group">
                    <label for="ccv">CCV</label>
                    <input type="text" class="form-control" id="ccv" name="ccv">
                </div>
                <div class="form-group">
                    <label for="expires">Ablaufdatum</label>
                    <input type="text" class="form-control" id="expires" name="expires">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Speichern</button>
                </div>
            </div>
        </form>

    </div>
<?php require_once __DIR__ . '/../../Partials/Footer.php'; ?>