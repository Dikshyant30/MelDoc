<?php
namespace App\Repositories\UserCrud;
use App\User;

class UserRepository implements UserRepositoryInterface {

    private $model;
    public function __construct(User $model)
    {
        $this->model=$model;
    }
    public function getAll()
    {
        return $this->model->all();
    }

   
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    // public function create(array $attributes)
    // {
    //     return $this->model->create($attributes);
    // }

    public function update(array $attributes,$id)
    {
        $user=$this->model->findOrFail($id);
        $user->update($attributes);
        return $user;
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
    }


}
?>
