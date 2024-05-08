<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

/**
 * Validiert die Eingaben des Wunschlisten-Formulars.
 * Überprüft, ob mindestens eine Eingabe vorhanden ist und dass keine Eingabe Sonderzeichen enthält
 * oder eine unzulässige Länge unter- oder überschreitet.
 */
function validateWishes($post)
{
    //Array für potenzielle Fehlermedlungen
    $errors = [];
    // Zähler für gültige Eingaben
    $validInputCount = 0;

    // Die Daten, welche in den Input-Feldern des Formulars sind, werden in einem Array gespeichert und durchlaufen
    foreach (['wish1', 'wish2', 'wish3'] as $field) {
        //Checkt ob das Feld nicht leer ist
        if (!empty($post[$field])) {
            // Überprüfung, ob das Feld nur Zeichen von A-Z (Groß- und Kleinbuchstaben), Zahlen, Leerzeichen und Umlaute enthält
            // und ob es eine zulässige Länge zwischen 4 und 20 Zeichen hat
            if (!preg_match('/^[a-zA-Z0-9äöüÄÖÜß ]{4,20}$/', $post[$field])) {
                $errors[$field] = "Der Wunsch darf weder Sonderzeichen enthalten, nicht kürzer als 4 und nicht länger als 20 Zeichen sein.";
            } else {
                // Inkrementieren für jedes gültig ausgefüllte Feld, um zu prüfen, ob zumindest ein Feld korrekt ausgefüllt ist
                $validInputCount++;
            }
        }
    }

    // Überprüfe, ob mindestens ein Feld gültig ausgefüllt wurde
    if ($validInputCount == 0) {
        $errors['general'] = "Mindestens ein Feld muss ausgefüllt werden.";
    }

    //Gibt das Error Array zurück
    return $errors;
}


// Funktion zur Validierung der Eingaben im Lieferadress-Formulars
function validateDelivery($post)
{
    $errors = [];

    //Hier wird für jedes Feld überprüft, ob es leer ist und nur erlaubte Zeichen verwendet werden
    //Wenn ja, Fehlermeldung!
    if (empty($post['name']) || !preg_match('/^[a-zA-ZäöüÄÖÜß ]{4,20}$/', $post['name'])) {
        $errors['name'] = 'Bitte geben Sie einen gültigen Namen ein.';
    }
    if (empty($post['address']) || !preg_match('/^[a-zA-Z0-9äöüÄÖÜß ]{4,30}$/', $post['address'])) {
        $errors['address'] = 'Bitte geben Sie eine gültige Adresse ein.';
    }
    if (empty($post['zip']) || !preg_match('/^[0-9]{5}$/', $post['zip'])) {
        $errors['zip'] = 'Die Postleitzahl muss fünfstellig sein.';
    }
    if (empty($post['city']) || !preg_match('/^[a-zA-ZäöüÄÖÜß ]{4,32}$/', $post['name'])) {
        $errors['city'] = 'Bitte geben Sie eine Stadt ein.';
    }


    return $errors;
}

//Ein Array zur Speicherung von Fehlermeldungen
$errors = [];
$stage = 1;  // Default Erste Form, das Formular der Wunschliste soll zuerst angezeigt werden

// Überprüft, ob das Wunschlisten-Formular abgesendet wurde
if (isset($_POST['submitWishes'])) {

    /*
    * Ruft die Funktion validateWishes auf, um die über die POST-Anfrage übermittelten Formulardaten zu validieren.
    * Die zurückgegebenen Fehlermeldungen werden in $errors gespeichert und verwendet, um dem Benutzer Rückmeldung zu geben,
    * welche Eingaben eventuell korrigiert werden müssen.
    * Wenn keine Fehler gefunden werden, wird zum nächsten Formular übergegangen.
    */

    $errors = validateWishes($_POST);

    // Prüft, ob das Array $errors leer ist, was bedeutet, dass keine Fehler gefunden wurden.
    if (empty($errors)) {
        // Speichert die validierten Daten in der Session, um sie später weiterverwenden zu können.
        $_SESSION['wishes'] = $_POST;
        // Setzt Stage auf 2, um zum nächsten Formular zu "gehen"
        $stage = 2;
    } else {
        // Wenn Fehler vorhanden sind, bleiben wir beim Wunschlistenformular um fehlerhafte Inputs zu korrigieren.
        $stage = 1;
    }
}

//Gleiches Prinzip wie beim Wunschlisten Formular :)
if (isset($_POST['submitDelivery'])) {
    $errors = validateDelivery($_POST);
    if (empty($errors)) {
        $_SESSION['delivery'] = $_POST;
        $stage = 3;
    } else {
        $stage = 2;
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Wishlist</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Open+Sans:300,700" rel="stylesheet">
</head>
<body>

<?php
switch ($stage) {
    case 1:
        //Bindet die angegebene Datei ein und wertet sie aus.
        include 'wishes_form.php';
        break;
    case 2:
        include 'delivery_form.php';
        break;
    case 3:
        include 'confirmation.php';
        break;
    default:
        echo "Ein unbekannter Fehler ist aufgetreten. :(";
        break;
}
?>


</body>
</html>

