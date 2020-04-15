<?php
namespace App\Contracts;


interface RepositoryInterface
{
    public function all($columns = ['*']);

    public function paginate($limit = null, $columns = ['*']);

    public function find($id, $columns = ['*']);

    public function create(array $attributes);

    public function update(array $attributes, $id);

    public function delete($id);

}
