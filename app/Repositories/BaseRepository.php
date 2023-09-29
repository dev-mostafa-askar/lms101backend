<?php 
namespace App\Repositories;

interface BaseRepository{

    public function create($data);
    public function update($model,$data);
    public function delete($id);
    public function list();
    public function find($id);
    
}