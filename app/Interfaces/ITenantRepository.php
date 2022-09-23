<?php

namespace App\Interfaces;

interface ITenantRepository
{
    public function getAll();



    public function querable();

    public function add(array $attributes);

    public function getById($id);

    public function update($id, array $attributes);

    public function delete($id);
}
