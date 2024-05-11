<div class="responsive-form">
    <h1>Wishlist</h1>
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
        <!--Checking whether an entry exists in the array $errors under the key wish1. -->
        <?php if (isset($errors['wish1'])): ?>
            <!-- If an error oocurs for the wish1 field, it will be displayed here. -->
            <div class="error">
                <!-- Displays the text of the error message that is stored in the array $errors under the key wish1..-->
                <?php echo $errors['wish1']; ?>
            </div>
             <!-- Closes the if condition-->
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
