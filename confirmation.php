<div class="confirm-container">
    <h1>Order Confirmation</h1>
    <h2>Your wishes:</h2>
    <ul>
        <?php
        //checks whether data is available in the ‘wishes’ session array.
        if (!empty($_SESSION['wishes'])) {
            foreach ($_SESSION['wishes'] as $key => $wish) {
                //Checks whether the respective wish is not empty before it is displayed.
                if (!empty($wish)) {
                    /*Displays every wish within a <li> tag.
                    htmlspecialchars ensures that all special HTML characters that could be contained in the wishes are converted into HTML entities,
                    are converted into HTML entities*/
                    echo "<li>" . htmlspecialchars($wish) . "</li>";
                }
            }
        }
        ?>
    </ul>

    <h2>Lieferdetails:</h2>
    <!-- Display delivery details -->
    <!-- The following data is loaded from the PHP session in which it was previously saved in the order process. -->
    <p>Name: <?php echo htmlspecialchars($_SESSION['delivery']['name']); ?></p>
    <p>Address: <?php echo htmlspecialchars($_SESSION['delivery']['address']); ?></p>
    <p>ZIP: <?php echo htmlspecialchars($_SESSION['delivery']['zip']); ?></p>
    <p>City: <?php echo htmlspecialchars($_SESSION['delivery']['city']); ?></p>
</div>
