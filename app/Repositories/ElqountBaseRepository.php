<?php 

namespace App\Repositories;

abstract class ElqountBaseRepository implements BaseRepository{

    private $model;

    public function __construct($model)
    {   
        $this->model = $model;
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($model,$data){
        return $model->update($data);
    }

    public function delete($id){
        $model = $this->find($id);
        $model->delete();
    }

    public function find($id){
        return $this->model->findOrFail($id);
    }

    public function list(){
        return $this->model->all();
    }

}