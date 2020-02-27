<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Repositories\UserCrud\UserRepositoryInterface;

class UserController extends Controller
{
    public $successStatus = 200;
   /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
       
//         $validator = Validator::make($request->all(), [ 
//             'first_name' => 'required',
//             'last_name' => 'required',
//             'phone_number' => 'required|max:10',
//             'specialist' => 'required|max:20',
//             'email' => 'required|email', 
//             'password' => 'required', 
//             'c_password' => 'required|same:password', 
//         ]);
// if ($validator->fails()) { 
//             return response()->json(['error'=>$validator->errors()], 401);            
//         }
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['first_name'] =  $user->first_name;
return response()->json(['success'=>$success], $this-> successStatus); 
    }
    /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }


    ////////////////////////////////////////////////////
    private $user;
  public function __construct(UserRepositoryInterface $users)
  {
    $this->user=$users;
  }
  public function getAllUsers()
  {
    return $this->user->getAll();
  }
  public function updateById(Request $request,$id)
  {

    $attribute = [
      'first_name'=>$request->input('first_name'),
      'last_name'=> $request->input('last_name'),
      'phone_number' => $request->input('phone_number'),
      'specialist'=>$request->input('specialist'),
      'email'=> $request->input('email'),
      'password' => $request->input('password')
    ];
    print_r($attribute);
    
    return $this->user->update($attribute,$id);
  }
  public function destroy($id)
  {
      return $this->user->delete($id);
  }
  public function show($id)
  {
      return $this->user->show($id);
  }
}
