<form action="index.php" method="post">
        <div class="form-group">
            <label>
                <input type="radio" id="female" name="salutation"> Frau
            </label>
            <label>
                <input type="radio" id="male" name="salutation"> Herr
            </label>
        </div>

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Max Mustermann" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="max.mustermann@email.com">
        </div>

        <div class="form-group">
            <label for="phone">Telefon (DACH)</label>
            <?php

                if (isset($errors['phone'])) {
                    echo "<p class=\"error\">{$errors['phone']}</p>";
                }

            ?>
            <input type="tel" name="phone" id="phone" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
        </div>

        <div class="form-group">
            <label for="country">Land</label>
            <select name="country" id="country">
                <option value="_default" selected disabled hidden>Bitte auswählen ...</option>
                <option value="at">Österreich</option>
                <option value="de">Deutschland</option>
                <option value="se">Schweden</option>
                <option value="ch">Schweiz</option>
            </select>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="agb" id="agb"> Bitte akzeptieren Sie die AGBs.
            </label>
        </div>

        <div class="form-group">
            <button type="submit">Absenden</button>
        </div>
    </form>