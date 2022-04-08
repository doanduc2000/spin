<?php

namespace Src\TableGateways;

class SpinGateway
{
    private $db = null;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function findAll()
    {
        $statement = "
        SELECT 
        * 
        FROM 
        vongquay; 
        ";
        try {
            $statement = $this->db->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function find($id)
    {
        $statement = "
            SELECT 
               *
            FROM
                vongquay
            WHERE id = ?;
        ";
        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array($id));
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function update($id, array $input)
    {
        $statement = "
            UPDATE vongquay
            SET 
                total = :total
            WHERE id = :id;
        ";
        try {
            $statement = $this->db->prepare($statement);
            $statement->execute(array(
                'id' => (int) $id,
                'total' => $input['total'],
            ));
            var_dump($statement);
            return $statement->rowCount();
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }
}
