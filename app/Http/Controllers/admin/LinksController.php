<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Link;
class LinksController extends Controller
{
    //
    public function index()
    {
        $links = new Link();
        $data = $links::all();
        return view('admin.links.index',['links' => $data]);
    }

    public function destroy($id)
    {
        Link::find($id)->delete();
        return redirect(route('links.index'));
    }

    public function edit($id)
    {
        $link = Link::find($id);
        return view('admin.links.edit',['link'=>$link]);
    }

    public function create()
    {
        return view('admin.links.add');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'alt_name' => 'required',//обязательно
            //обязательно
        ]);
        $link = Link::find($id);
        $link->alt_name=$request->get('alt_name');
        $link->bir_name=$request->get('bir_name');
        $link->link=$request->get('link');
        $link->save();
        return redirect(route('links.index'));
    }

    public function store(Request $request)
    {
        $link = new Link();
        $link->alt_name=$request->input('alt_name');
        $link->bir_name=$request->input('bir_name');
        $link->link=$request->input('link');
        $link->save();
        return redirect(route('links.index'));

    }


}
