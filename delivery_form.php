<div class="responsive-form">
    <h1>Shipping address</h1>
    <form class="form-container" method="post" action="index.php">
        <label for="firstAndLastName"
               class="form-container-label">
            Vor- und Nachname:
        </label>
        <input type="text"
               id="firstAndLastName"
               name="name"
               placeholder="Marge Simpson"
               class="form-container-input">
        <!--Es wird geprüft, ob im Array $errors ein Eintrag unter dem Schlüssel name existiert. -->
        <?php if (isset($errors['name'])): ?>
            <!-- Wenn ein Fehler für das name-Feld vorhanden ist, wird dieser hier angezeigt. -->
            <div class="error">
                <!--Gibt den Text der Fehlermeldung aus, die im Array $errors unter dem Key name gespeichert ist.-->
                <?php echo $errors['name']; ?>
            </div>
        <!-- Schließt die if Bedingung ab-->
        <?php endif; ?>

        <label for="address"
               class="form-container-label">
            Strasse und Hausnummer
        </label>
        <input type="text"
               id="address"
               name="address"
               placeholder="742 Evergreen Terrace"
               class="form-container-input"
        >
        <?php if (isset($errors['address'])): ?>
            <div class="error"><?php echo $errors['address']; ?></div>
        <?php endif; ?>

        <label for="zip"
               class="form-container-label">
            Postleitzahl
        </label>
        <input type="text"
               id="zip"
               name="zip"
               placeholder="00939"
               class="form-container-input"
        >
        <?php if (isset($errors['zip'])): ?>
            <div class="error"><?php echo $errors['zip']; ?></div>
        <?php endif; ?>

        <label for="city"
               class="form-container-label">
            Stadt
        </label>
        <input type="text"
               id="city"
               name="city"
               placeholder="Springfield"
               class="form-container-input">
        <?php if (isset($errors['city'])): ?>
            <div class="error"><?php echo $errors['city']; ?></div>
        <?php endif; ?>
        <button type="submit" name="submitDelivery" class="form-container-button">Submit</button>
    </form>
</div>