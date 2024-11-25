<?php
// Datenbankverbindung herstellen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ip_tracking";

// Verbindung aufbauen
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung prüfen
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

// IP-Adresse erfassen
$ip = $_SERVER['REMOTE_ADDR'];

// SQL-Befehl zum Einfügen der IP-Adresse
$sql = "INSERT INTO ip_logs (ip_address) VALUES ('$ip')";

if ($conn->query($sql) === TRUE) {
    echo "<h1>Vielen Dank!</h1>";
    echo "<p>Deine IP-Adresse wurde erfolgreich gespeichert.</p>";
} else {
    echo "Fehler: " . $sql . "<br>" . $conn->error;
}

// Verbindung schließen
$conn->close();
?>
