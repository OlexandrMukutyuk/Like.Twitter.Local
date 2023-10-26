<?php
    try {
        $connections = new PDO('mysql:host=localhost;dbname=Twitter', 'root', '');
        $connections->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die('Error: Could not connect to the database.');
    }
    
    