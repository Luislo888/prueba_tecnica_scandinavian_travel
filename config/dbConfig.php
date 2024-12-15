<?php
const HOST = 'localhost';
const DB = 'shop';
const USER = 'root';
const PASS = '1234';

try {
    $pdo = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
