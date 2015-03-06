<?php

interface DAO {
    public function getAll();
    public function getById($id);
    public function getByParameter(Array $fields, Array $values);
    public function insert($obj);
    public function update($obj, $where);
    public function delete($where);
}
