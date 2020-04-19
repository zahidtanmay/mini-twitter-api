<?php

namespace App\Contracts;

interface RepositoryInterface
{
    public function all($columns = ['*']);

    public function paginate($limit = null, $columns = ['*']);

    public function find($id, $columns = ['*']);

    public function findOrFail($id, $columns = ['*']);

    public function findBy($field, $value, $columns = array('*'));

    public function orderBy($column, $direction = 'asc');

    public function create(array $attributes);

    public function update(array $attributes, $id);

    public function delete($id);

}
