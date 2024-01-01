<?php
   $connexion = new PDO("mysql:host=127.0.0.1;port=3306;dbname=hospitale2n", 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
]);