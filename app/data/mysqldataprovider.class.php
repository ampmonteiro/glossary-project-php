<?php

#should be an interface because none of methods or
# dont have a method that is used cross child

class MysqlDataProvider extends DataProvider
{

    public function get_terms()
    {
        return $this->query('SELECT * FROM terms');
    }

    public function get_term($term)
    {
        $db = $this->connect();

        if ($db === null) {
            return;
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
            return;
        }

        // unecessary if using fetch instead of fetch all
        return $data[0];
    }

    public function search_terms($search)
    {

        $sql = 'SELECT * FROM terms WHERE term LIKE :search OR definition like :search';

        return $this->query(
            $sql,
            [
                ':search' => '%' . $search . '%'
            ]
        );
    }

    public function update_term($original_term, $new_term, $definition)
    {
        $sql = 'UPDATE terms SET term = :term, definition = :definition WHERE id = :id';

        $this->execute(
            $sql,
            [
                ':term' => $new_term,
                ':definition' => $definition,
                ':id' => $original_term
            ]
        );
    }


    public function add_term($term, $definition)
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


    public function delete_term($term)
    {
        $sql = 'DELETE FROM terms WHERE id = :id';

        $this->execute(
            $sql,
            [
                ':id' => $term
            ]
        );
    }


    private function execute($sql, $params)
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

    private function query($sql, $params = [])
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

    private function connect()
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
