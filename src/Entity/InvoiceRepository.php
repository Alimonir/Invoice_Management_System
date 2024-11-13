<?php declare(strict_types=1);

namespace Invoice\Entity;
use Invoice\Database\Mysql;
use PDO;
//will use mysql class and loading all invoices from my db
class InvoiceRepository
{

    private PDO $pdo;
    public function __construct(){
        $this->pdo = (new Mysql())->connect();
    }
    public function load():array{
        $stmt = $this->pdo->query(
            'SELECT * FROM `invoice` ORDERD BY created_at DESC'
        );
        return $stmt->fetchAll();
    }
}