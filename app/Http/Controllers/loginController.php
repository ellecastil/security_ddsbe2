<?php 
    namespace App\Http\Controllers;
    
    //use App\User;
    use App\Models\User;    //your model
    use Illuminate\Http\Response;
    use App\Traits\ApiResponser; //standardized code for api response
    use Illuminate\Http\Request;  //handling http request in lumen 
    use DB;     //if not using eloquent, use this DB component in lumen
    
    
    Class loginController extends Controller {     
        use ApiResponser;
        
        private $request;
    
        public function __construct(Request $request){
        $this->request = $request;
        }

        // public function getUsers(){         
        //     // $users = User::all();
        //     // return response() ->json($users,200);         
        //     // //return $this->response($users, 200);
            
        //     $users = DB::connection('mysql')
        //     ->select("Select * from tbluser");

        //      return $this->successResponse($users);
        // }

        public function showlogin(){
            return view('pages.login');
        }

        //user login
        public function result(){
            
            $user = $_POST["username"];
            $pass = $_POST["password"];

            // // $user = DB::connection('mysql')
            // // ->select("Select * from tbluser");

            // // return $this->successResponse($user);
            // // $user = User::all();
            // // return $this->successResponse($user);
            // // $log = User::all();
            // // $match = false;
            $login = app('db')->select("select * from tbluser where username='$user' and password ='$pass'");
            //$login = DB::select("select * from tbluser where username='$user' and password ='$pass'");
                        
            if(empty($login)){
                //return $this->successResponse($users);
                echo '<script>alert("SUCCESS")</script>';
                return view('pages.login');
            }else{
                return view('pages.login');
            }

        }

}
