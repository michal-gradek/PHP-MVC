<?php

namespace MVC;

use PDO;

abstract class Model {

    protected $dbh;
	protected $stmt;
    protected $lastInsertId;

    public function __construct() {
        $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    }

    public function select(string $query, array $params = []) : array {
        try {
            $this->stmt = $this->dbh->prepare($query);
            $this->stmt->execute($params);
        } catch (PDOException $e) {
            var_dump($e);

            return null;
        }

        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

    public function edit(array $query) : bool {
        try {
            $this->dbh->beginTransaction();
            $this->stmt = $this->dbh->prepare($query[0]);
            $this->stmt->execute($query[1]);
            $this->lastInsertId = $this->dbh->lastInsertId();
            $this->dbh->commit();
        } catch (PDOException $e) {
            $this->dbh->rollBack();
            var_dump($e);
            
            return false;
        }

		return true;
	}

    public function insertLastId(array $query) : int {
        $this->edit( $query );

		return $this->lastInsertId;
	}
}

?>