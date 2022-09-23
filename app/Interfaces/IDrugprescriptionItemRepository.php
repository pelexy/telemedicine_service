<?php


namespace App\Interfaces;


interface IDrugListRepository
{

    public function add(array $attributes);

    public function delete($id);
}