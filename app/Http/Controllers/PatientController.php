<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Patient; 
use App\Repositories\PatientCrud\PatientRepositoryInterface;
use Validator;
//use App\Rules\Uppercase;

class PatientController extends Controller
{
  private $patient;
  public function __construct(PatientRepositoryInterface $patients)
  {
    $this->patient=$patients;
  }

  public function createPatient(Request $request)
  {

//     $validate=Validator::make($request->all(),[
//       'text'=>'required',
//       'user_id'=>'required',
//       'completed'=>'required',
//   ] );
//   if($validate->fails())
//   {
//       return response()->json(['error'=>$validate->errors()],401);
//   }


$attribute = [
    'first_name'=>$request->input('first_name'),
    'last_name'=> $request->input('last_name'),
    'age' => $request->input('age'),
    'disease'=>$request->input('disease'),
    'status'=>$request->input('status'),
    'phone_number'=> $request->input('phone_number'),
    'created_by'=> $request->input('created_by'),
    'updated_by' => $request->input('updated_by')
  ];
    // $attribute->save();
    print_r($attribute);
    return $this->patient->create($attribute);
  }
  public function getAllPatients()
  {
    return $this->patient->getAll();
  }
  public function updateById(Request $request,$id)
  {
  //   $validate=Validator::make($request->all(),[
  //     'text'=>'required|max:20',
  //     'user_id'=>'required|max:20',
  //     'completed'=>'bail|required|in:1,0',
  // ] );
  
  // if($validate->fails())
  // {
  //     return response()->json(['error'=>$validate->errors()],401);
  // }

  
// $request->validate([
//     'text' => ['required', 'string', new Uppercase],
//     'user_id' => ['required', 'max:20'],
//     'completed' => ['required', 'in:1,0']
// ]);

// if($validate->fails())
//   {
//       return response()->json(['error'=>$validate->errors()],401);
//   }

$attribute = [
    'first_name'=>$request->input('first_name'),
    'last_name'=> $request->input('last_name'),
    'age' => $request->input('age'),
    'disease'=>$request->input('disease'),
    'status'=>$request->input('status'),
    'phone_number'=> $request->input('phone_number'),
    'created_by'=> $request->input('created_by'),
    'updated_by' => $request->input('updated_by')
  ];
    print_r($attribute);
    
    return $this->patient->update($attribute,$id);
  }
  public function destroy($id)
  {
      return $this->patient->delete($id);
  }
  public function show($id)
  {
      return $this->patient->show($id);
  }
}
