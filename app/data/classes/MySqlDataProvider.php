<?php

#in this original add interface to this provider

class MysqlDataProvider implements DataProviderInterface
{
    // apply php 8 feature promoting class properties on source prop
    function __construct(
        private string $source
    ) {
    }

    public function getTerms(): array
    {
        return $this->query('SELECT * FROM terms');
    }

    public function getTerm(string $term): object
    {
        $db = $this->connect();

        if ($db === null) {
            return new stdClass();
        }

        $sql = 'SELECT * FROM terms WHERE id = :id';
        $smt = $db->prepare($sql);

        $smt->execute([
            ':id' => $term
        ]);

        // should be using fetch instead of fetch all
        $data = $smt->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        $smt = null;

        $db = null;

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
        $db = $this->connect();

        if ($db === null) {
            return;
        }

        $smt = $db->prepare($sql);

        $smt->execute($params);

        $smt = null;

        $db = null;
    }

    private function query(string $sql, array $params = []): array | bool
    {
        $db = $this->connect();

        if ($db === null) {
            return [];
        }

        $query = null;

        if (empty($params)) {

            $query = $db->query($sql);
        } else {
            $query = $db->prepare($sql);
            $query->execute($params);
        }

        $data = $query->fetchAll(PDO::FETCH_CLASS, 'GlossaryTerm');

        $query = null;

        $db = null;

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
