<?php
namespace App\Http\Traits;

use Illuminate\Http\Request;
use Image;


trait GeneralTrait {

    public function returnError($errNum,$msg){
        return response()->json([
            'status' => false,
            'error' => $errNum,
            'msg' => $msg
        ]);
    }

    public function returnSuccess($errNum,$msg){
        return response()->json([
            'status' => true,
            'success' => $errNum,
            'msg' => $msg
        ]);
    }

    public function returnData($key,$value,$msg){
        return response()->json([
            'status' => true,
            'msg' => $msg,
            $key => $value
        ]);
    }

    public function returnCodeErrorInput($validator){
        $inputs = array_keys($validator->errors()->toArray());
        $code = $this->getCode($inputs[0]);
        return $code;
    }

    public function getCode($input){
        if($input == "name")
            return 'E0011';
        elseif($input == "password")
            return 'E001';
        elseif($input == "mobile")
            return 'E002';
        elseif($input == "email")
            return 'E003';

    }

}
