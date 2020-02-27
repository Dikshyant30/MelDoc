<?php
namespace App\Repositories\PatientCrud;
use App\Patient;

class PatientRepository implements PatientRepositoryInterface {

    private $model;
    public function __construct(Patient $model)
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
        $patient=$this->model->findOrFail($id);
        $patient->update($attributes);
        return $patient;
    }
    public function delete($id)
    {
        return $this->model->destroy($id);
    }


}
?>
