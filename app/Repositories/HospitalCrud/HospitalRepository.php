<?php
namespace App\Repositories\HospitalCrud;
use App\Hospital;

class HospitalRepository implements HospitalRepositoryInterface {

    private $model;
    public function __construct(Hospital $model)
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

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes,$id)
    {
        $hosp=$this->model->findOrFail($id);
        $hosp->update($attributes);
        return $hosp;
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
    }


}
?>
