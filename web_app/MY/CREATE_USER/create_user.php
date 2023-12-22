<!-- create_user.php -->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Připojení k databázi nebo uložení do souboru (podle konkrétních potřeb)
    // ...

    // Vytvoření uživatele (prozatím jen v simulaci)
    $newUser = "Username: $username, Email: $email";

    // Přesměrování na úspěšnou stránku nebo zobrazení zprávy
    header('Location: success.php');
    exit();
}
?>
