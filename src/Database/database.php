<?php declare(strict_types=1);
namespace Invoice\Database;
/**
 * CREATE TABLE invoice( invoice_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, invoice_number VARCHAR(255) NOT NULL, invoice_to VARCHAR(255) NOT NULL, DATE VARCHAR(255) NOT NULL, due_date VARCHAR(255) NOT NULL, paid DECIMAL(8, 2) DEFAULT 0.00, due_paid DECIMAL(8, 2) DEFAULT 0.00, subtotal DECIMAL(8, 2) DEFAULT 0.00, total DECIMAL(8, 2) DEFAULT 0.00, currency VARCHAR(3) NOT NULL, statue VARCHAR(50) NOT NULL, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP );
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */
use PDO;
$db = new PDO('mysql:host=127.0.0.1;dbname=invoice_management_system', "root");
echo "<pre>";
print_r(
    $db
);