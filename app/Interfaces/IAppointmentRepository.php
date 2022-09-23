<?php


namespace App\Interfaces;


interface IAppointmentRepository
{
    public function getAll();



    public function querable();

    public function add(array $attributes);

    public function update_($id, array $attributes);

    public function getById($id);

    public function delete($id);
}
