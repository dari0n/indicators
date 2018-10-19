<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReturnLink;

class ReturnLinkController extends Controller
{
    public function index(Request $request)
    {

        if($request->alt_name) {
            $links = ReturnLink::where('alt_name', $request->alt_name)->first();
            if($links){
                $data = $links->toArray();
                return view('admin.links.ajax',['links' => $data]);
            }

        }
        return null;
    }

    private function parseLinks($links,$rq)
    {


        //'<a type="button" href="'.$link['link'].'" class="btn btn-block btn-primary btn-lg" target="_blank">'.$link['bir_name'].'</a>'
        //print('<a href="'.$link['link'].'" target="_blank">'.$link['bir_name'].'</a><br/>');
    }
}
