<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Hospital; 
use App\Repositories\HospitalCrud\HospitalRepositoryInterface;
use Validator;
//use App\Rules\Uppercase;

class HospitalController extends Controller
{
  private $hosp;
  public function __construct(HospitalRepositoryInterface $hosps)
  {
    $this->hosp=$hosps;
  }

  public function createHospital(Request $request)
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
      'name'=>$request->input('name'),
      'location'=> $request->input('location'),
      'contact_number' => $request->input('contact_number'),
      'ratings'=>$request->input('ratings'),
      'created_by'=> $request->input('created_by'),
      'updated_by' => $request->input('updated_by')
    ];
    // $attribute->save();
    print_r($attribute);
    return $this->hosp->create($attribute);
  }
  public function getAllHospitals()
  {
    return $this->hosp->getAll();
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
    'name'=>$request->input('name'),
    'location'=> $request->input('location'),
    'contact_number' => $request->input('contact_number'),
    'ratings'=>$request->input('ratings'),
    'created_by'=> $request->input('created_by'),
    'updated_by' => $request->input('updated_by')
  ];
    print_r($attribute);
    
    return $this->hosp->update($attribute,$id);
  }
  public function destroy($id)
  {
      return $this->hosp->delete($id);
  }
  public function show($id)
  {
      return $this->hosp->show($id);
  }
}
