<?php
// Basic connection settings
$databaseHost = '127.0.0.1';
$databaseUsername = 'root';
$databasePassword = '';
$databaseName = 'crud';

// Connect to the database
$conexao = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName) or die('Não foi possivel conectar'); 
?>