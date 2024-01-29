<?php

namespace App;

use App\Model;


class Service{

    public function __construct(/*Model*/ $model){
        $this->model = $model;
    }

    public function fetch($returnQuery = false, $where = [], $withPagination = true, $with = [], $recordsPerPage = 20)
    {
        try {
            $query = $this->model::query();
            if (count($with) > 0) {
                $query->with($with);
            }
            if (count($where) > 0) {
                $query->where($where);
            }

            if ($returnQuery) {
                return $query;
            } else {
                if ($withPagination) {
                    return $query->paginate($recordsPerPage);
                } else {
                    return $query->get();
                }
            }
        }
        catch (\Exception $ex){
            //die($ex->getTrace());
            throw new \Exception($ex->getMessage());
        }

    }

    public function store($data)
    {
        /*$password = $data['password'];
        $data['user_name'] = Str::slug($data['first_name'].''.  $data['last_name']);
        $user =$this->model->create($data);
        // Assign Role To User
        $user->assignRole($data['role']);
        return $user;*/
        try {
            return $this->model::create($data);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }

    }

    public function getRow($id, $with = [])
    {
        try {
            $query = $this->model::query();
            if( count($with) > 0 ){
                $query->with($with);
            }
            return $query->find($id);
        } catch (\Exception $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public function update($data, $id)
    {
        try{
            $object = $this->model::find($id);
            if(!is_object($object)){
                throw new \Exception("couldn't found the record with given id");
            }
            return $object->update($data);
        }
        catch (\Exception $ex){
            throw new \Exception($ex->getMessage());
        }
    }

    public function delete($id)
    {
        try{
            $object = $this->model::find($id);
            if(!is_object($object)){
                throw new \Exception("couldn't found the record with given id");
            }
            return $object->delete();
        }
        catch (\Exception $ex){
            throw new \Exception($ex->getMessage());
        }
    }
}
