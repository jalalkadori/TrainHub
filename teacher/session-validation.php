<?php 
include("./db_connection.php");
include("./session_config.php");

$idFormateur = $_SESSION['id_formateur'];


if(isset($_POST['valider'])) {
    $id_inscription = $_POST['idInscription'];
    $validation = $_POST['validation'];
    // Validate the input
    if (!empty($validation)) {
        // Update the validation column inside the inscription Table based on the row id
        $sessionValidationQuery = "UPDATE `inscription` SET `VALIDATION` = :validation WHERE `inscription`.`ID_INSCRIPTION` = :id_inscription";
        $sessionValidation = $db_connection->prepare($sessionValidationQuery);
        $sessionValidation->bindParam(':validation', $validation);
        $sessionValidation->bindParam(':id_inscription', $id_inscription);
        $sessionValidation->execute();

        // Redirect back to the original page
        header("Location: sessions.php?message=$validation&inscriptionId=$id_inscription");
    } 
} 
?>