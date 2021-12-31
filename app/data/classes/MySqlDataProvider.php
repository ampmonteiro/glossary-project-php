<?php

#in this original add interface to this provider

class MysqlDataProvider implements DataProviderInterface
{
    private PDO $db;


    // apply php 8 feature promoting class properties on source prop
    public function __construct(
        private string $source
    ) {
        $this->db = $this->connect();
    }

    public function getTerms(): array
    {
        return $this->query('SELECT * FROM terms');
    }

    public function getTerm(string $term): object
    {

        if ($this->db === null) {
            return new stdClass();
        }

        $sql = 'SELECT * FROM terms WHERE id = :id';
        $smt = $this->db->prepare($sql);

        $smt->execute([
            ':id' => $term
        ]);

        // should be using fetch instead of fetch all
        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        $smt = null;

        // $this->db = null;

        if (empty($data)) {
            return new stdClass();
        }

        // unecessary if using fetch instead of fetch all
        return $data[0];
    }

    public function searchTerms(string $search): array | bool
    {
        $sql = 'SELECT * FROM terms WHERE term LIKE :search OR definition like :search';

        return $this->query(
            $sql,
            [
                ':search' => '%' . $search . '%'
            ]
        );
    }

    public function updateTerm(string | int $originalTerm, string $newTerm, string $definition): void
    {
        $sql = 'UPDATE terms SET term = :term, definition = :definition WHERE id = :id';

        $this->execute(
            $sql,
            [
                ':term' => $newTerm,
                ':definition' => $definition,
                ':id' => $originalTerm
            ]
        );
    }


    public function addTerm(string $term, string $definition): void
    {
        $sql = 'INSERT INTO terms (term, definition) VALUES (:term, :definition)';

        $this->execute(
            $sql,
            [
                ':term' => $term,
                ':definition' => $definition
            ]
        );
    }


    public function deleteTerm(string | int $term): void
    {
        $sql = 'DELETE FROM terms WHERE id = :id';

        $this->execute(
            $sql,
            [
                ':id' => $term
            ]
        );
    }


    private function execute(string $sql, array $params = []): void
    {

        if ($this->db === null) {
            return;
        }

        $smt = $this->db->prepare($sql);

        $smt->execute($params);

        $smt = null;

        // this should not be needed because it is closed when finished the script

        // $this->db = null;
    }

    private function query(string $sql, array $params = []): array | bool
    {

        if ($this->db === null) {
            return [];
        }

        $query = null;

        if (empty($params)) {

            $query = $this->db->query($sql);
        } else {
            $query = $this->db->prepare($sql);
            $query->execute($params);
        }

        $data = $query->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        $query = null;

        // this should not be needed because it is closed when finished the script
        // $this->db = null;

        return $data;
    }

    private function connect(): PDO
    {

        try {
            return new PDO($this->source, CONFIG['db_user'], CONFIG['db_password']);
        } catch (PDOException $e) {
            echo $e->getMessage();

            exit;
            // return null;
        }
    }
}
