<div class="responsive-form">
    <h1>Wunschliste</h1>
    <form class="form-container" method="post" action="index.php">
        <label for="firstWish"
               class="form-container-label">
            Wish 1
        </label>
        <input type="text"
               id="firstWish"
               name="wish1"
               placeholder="Lego"
               class="form-container-input" >
        <!--Es wird geprüft, ob im Array $errors ein Eintrag unter dem Schlüssel wish1 existiert. -->
        <?php if (isset($errors['wish1'])): ?>
            <!-- Wenn ein Fehler für das wish1-Feld vorhanden ist, wird dieser hier angezeigt. -->
            <div class="error">
                <!--Gibt den Text der Fehlermeldung aus, die im Array $errors unter dem Key wish1 gespeichert ist.-->
                <?php echo $errors['wish1']; ?>
            </div>
            <!-- Schließt die if Bedingung ab-->
        <?php endif; ?>

        <label for="secondWish"
               class="form-container-label">
            Wish 2
        </label>
        <input type="text"
               id="secondWish"
               name="wish2"
               placeholder="Light Saber"
               class="form-container-input"
               >
        <?php if (isset($errors['wish2'])): ?>
            <div class="error"><?php echo $errors['wish2']; ?></div>
        <?php endif; ?>

        <label for="thirdWish"
               class="form-container-label">
            Wish 3
        </label>
        <input type="text"
               id="thirdWish"
               name="wish3"
               placeholder="A bike"
               class="form-container-input"
               >
        <?php if (isset($errors['wish3'])): ?>
            <div class="error"><?php echo $errors['wish3']; ?></div>
        <?php endif; ?>

        <?php if (!empty($errors['general'])): ?>
            <div class="error"><?php echo $errors['general']; ?></div>
        <?php endif; ?>


        <button type="submit" name="submitWishes"
                class="form-container-button">
            Submit
        </button>
    </form>
</div>