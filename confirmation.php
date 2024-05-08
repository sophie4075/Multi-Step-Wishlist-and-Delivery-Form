<div class="confirm-container">
    <h1>Bestätigung Ihrer Bestellung</h1>
    <h2>Deine Wünsche:</h2>
    <ul>
        <?php
        //überprüft, ob im Session-Array 'wishes' Daten vorhanden sind.
        if (!empty($_SESSION['wishes'])) {
            //Durchläuft das Array, wenn es nicht leer ist
            foreach ($_SESSION['wishes'] as $key => $wish) {
                //Überprüft, ob der jeweilige Wunsch nicht leer ist, bevor er angezeigt wird.
                if (!empty($wish)) {
                    /*Zeigt jeden Wunsch innerhalb eines <li>-Tags an.
                    htmlspecialchars stellt sicher, dass alle speziellen HTML-Zeichen, die in den Wünschen enthalten sein könnten,
                    in HTML-Entitäten umgewandelt werden.*/
                    echo "<li>" . htmlspecialchars($wish) . "</li>";
                }
            }
        }
        ?>
    </ul>

    <h2>Lieferdetails:</h2>
    <!-- Lieferdetails-Anzeige -->
    <!-- Die folgenden Daten werden aus der PHP-Session geladen, in der sie vorher im Bestellprozess gespeichert wurden. -->
    <p>Name: <?php echo htmlspecialchars($_SESSION['delivery']['name']); ?></p>
    <p>Adresse: <?php echo htmlspecialchars($_SESSION['delivery']['address']); ?></p>
    <p>PLZ: <?php echo htmlspecialchars($_SESSION['delivery']['zip']); ?></p>
    <p>Stadt: <?php echo htmlspecialchars($_SESSION['delivery']['city']); ?></p>
</div>