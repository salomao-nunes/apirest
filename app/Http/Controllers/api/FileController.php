<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FileController extends Controller
{
    //
    public function upload(Request $req){

       $result=$req->file('photo')->store('public/apiUploads/');
       return ["result"=>$result];

    }
}
