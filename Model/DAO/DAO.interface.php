<?php

interface DAO {
    public function getAll();
    public function getById(int $id);
    public function getByParameter(Array $fields, Array $values);
    public function insert(Object $obj);
    public function update(Object $obj);
    public function deleteById(int $obj);
}
