<?php

// Validamos que el formulario se haya enviado
if (isset($_POST['submit'])) {

    // Obtenemos los datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $donation_interests = $_POST['donation_interests'];

    // Validamos los datos
    if (empty($name)) {
        echo "El nombre es obligatorio.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido.";
    } else if (empty($donation_interests)) {
        echo "Debes seleccionar al menos un interés de donación.";
    } else {

        // Guardamos los datos en la base de datos
        $db = new PDO('mysql:host=localhost;dbname=educacommunities', 'root', '');
        $sql = "INSERT INTO users (name, email, donation_interests) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$name, $email, $donation_interests]);

        // Redirigimos al usuario a la página de agradecimiento
        header('Location: /thank-you.php');
    }
}

?>

