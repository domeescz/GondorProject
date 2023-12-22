<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Připojení k databázi (upravte podle svých údajů)
    $servername = "your_servername";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_dbname";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Získání nového hesla z formuláře
    $new_password = $_POST['new_password'];

    // Předpokládáme, že máme uživatele přihlášeného pomocí session
    $user_id = $_SESSION['user_id'];

    // Případné ošetření vstupů pro prevenci SQL injection
    $new_password = mysqli_real_escape_string($conn, $new_password);

    // Případné šifrování hesla (např. pomocí password_hash)
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Aktualizace hesla v databázi pro aktuálního uživatele (podle ID uživatele)
    $sql = "UPDATE users SET password='$hashed_password' WHERE id=$user_id";

    if ($conn->query($sql) === TRUE) {
        echo "Heslo bylo úspěšně změněno.";
    } else {
        echo "Chyba při změně hesla: " . $conn->error;
    }

    $conn->close();
}
?>
