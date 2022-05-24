<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Traits\GeneralTrait;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{

    use GeneralTrait;



    public function index(){
        $category = new CategoryResource( Category::find(5) );   ///// For Only One Data
        $category = CategoryResource::collection(Category::all());   ///// For Only All Data
        // return response()->json($category);

        //// Return With Id

        // $category = Category::find($request->id);

        if(!$category){
            return $this->returnError('404','Data Not Found');
        }elseif($category){
            return $this->returnData('category',$category,'Success Get Data');
        }

        //// Update With Id
        // $category = Category::whereId($request->id)->update(['category_name_en' => $request->name]);

        // if(!$category){
        //     return $this->returnError('404','Data Not Found');
        // }elseif($category){
        //     return $this->returnSuccess('200','Success Update Data');
        // }

    }

    public function login(Request $request){
        ///validation

        $rules = [
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);

        try{

            if($validator->fails()){
                $code = $this->returnCodeErrorInput($validator);
                return $this->returnError($code,$validator->errors()->first());
            }

            $requestLogin = $request->only(['email','password']);

            $token = Auth::guard('userApi')->attempt($requestLogin);

            if(!$token){
                return  $this->returnError('E005','Login Failed');}

            $user = Auth::guard('userApi')->user();
            $user->api_token = $token;

            return $this->returnData('user',$user,'Login Successfly');

        }catch(\Exception $ex){
            return  $this->returnError($ex->getCode(),$ex->getMessage());
        }


    }

    public function register(Request $request){
        ///validation

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);

        try{

            if($validator->fails()){
                $code = $this->returnCodeErrorInput($validator);
                return $this->returnError($code,$validator->errors()->first());
            }


            $user = User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);


            if(!$user)
                return $this->returnError('401','User Not Register');

            return $this->returnSuccess(200,'User Register Successfly');

        }catch(\Exception $ex){
            return  $this->returnError($ex->getCode(),$ex->getMessage());
        }


    }


    public function logout(Request $request){
        $token = $request -> header('auth_token');
        try{
            if($token){
                JWTAuth::setToken($token)->invalidate();
                return $this->returnSuccess('200','Success Logout');

            }else{
                return $this->returnError('404','Some Thing Wrong');
            }

        }catch(\Exception $ex){
            return  $this->returnError($ex->getCode(),$ex->getMessage());
        }
    }

    public function profile(Request $request){
        return Auth::user();
    }
    public function updateProfile(Request $request){


        try{

            $user = User::whereId($request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);


            if(!$user)
                return $this->returnError('401','User Not Updated');

            return $this->returnSuccess(200,'User Updated Successfly');

        }catch(\Exception $ex){
            return  $this->returnError($ex->getCode(),$ex->getMessage());
        }
    }
}
