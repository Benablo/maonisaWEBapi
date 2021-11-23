<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\shoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Flash;
use Response;

class PostShoesController extends Controller {

    public $successStatus = 200;

    public function getAllPosts(Request $request) {
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid) ->where('remember_token', $token)->first();

        $shoes = DB::table('shoes')
                    ->leftJoin('users', 'shoes.id', '=', 'users.id')
                    ->select('shoes.brand', 'shoes.name', 'shoes.prize', 'users.name', 'shoes.created_at', 'shoes.updated_at')
                    ->get();

            return response()->json($shoes, $this->successStatus);

        if ($user != null) {
          //  $shoes = Shoes::all();
            $shoes = DB::table('shoes')
                    ->leftJoin('users', 'shoes.id', '=', 'users.id')
                    ->select('shoes.brand', 'shoes.name', 'shoes.prize', 'users.name', 'shoes.created_at', 'shoes.updated_at')
                    ->get();

            return response()->json($shoes, $this->successStatus);
        }else {
            return response()->json(['response' => 'Bad Call'], 501);
        }
    }

    public function getShoes(Request $request) {
        $id = $request['shoes_id']; // shoes_id = shoes id
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $shoes = Shoes::where('id', $id)->first();

            if ($shoes != null) {
                return response()->json($shoes, $this->successStatus);
            } else {
                return response()->json(['response' => 'Shoes not found!'], 404);
            }
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }
    }

    public function searchShoes(Request $request) {
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid
        $shoesno = $request['shoes_no']; // shoes_no = shoesno

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $shoes = Shoes::where('Brand', 'LIKE', '%' . $shoesno . '%')
                ->orWhere('Name', 'LIKE', '%' . $shoesno . '%')
                ->get();
            // SELECT * FROM shoes WHERE description LIKE '%shoesno%' OR title LIKE '%shoesno%'
            if ($shoes != null) {
                return response()->json($shoes, $this->successStatus);
            } else {
                return response()->json(['response' => 'Shoes not found!'], 404);
            }
        } else {
            return response()->json(['response' => 'Bad Call'], 501);
        }
    }
}

