<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReturnLink;

class ReturnLinkController extends Controller
{
    public function index(Request $request)
    {
        if($request->alt_name) {
            $links = ReturnLink::where('alt_name', $request->alt_name)->get();
            $this->parseLinks($links->toArray(),$request->alt_name);
        }
        return null;
    }

    private function parseLinks($links,$rq)
    {
        if ($links)
        {

            foreach ($links as $link)
            {

                print('<a type="button" href="'.$link['link'].'" class="btn btn-block btn-primary btn-lg" target="_blank">'.$link['bir_name'].'</a>');
            }
        }
        return null;
            //print('<a href="'.$link['link'].'" target="_blank">'.$link['bir_name'].'</a><br/>');


    }
}
