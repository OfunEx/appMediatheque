<?php
function connect()
{
    try
    {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=localhost;dbname=media', 'root', '', $pdo_options);
        $bdd->exec('SET NAMES utf8');
        return $bdd;
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
}
?>

