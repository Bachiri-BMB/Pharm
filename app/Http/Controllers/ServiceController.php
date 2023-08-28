<?php

namespace App\Http\Controllers;
use App\Models\services;
use App\Models\Category;

use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $title = "services";
        $services = services::get();
        return view('services.service',compact(
            'title','services',
        ));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:100',
        ]);
        services::create($request->all());
        $notification=array(
            'message'=>"services has been added",
            'alert-type'=>'success',
        );
        return back()->with($notification);
    }


    public function update(Request $request)
    {
        $this->validate($request,['name'=>'required|max:100']);
        $services = services::find($request->id);
        $services->update([
            'name'=>$request->name,
        ]);
        $notification=array(
            'message'=>"services has been updated",
            'alert-type'=>'success',
        );
        return back()->with($notification);
    }


    public function destroy(Request $request)
    {
        $services = services::find($request->id);
        $services->delete();
        $notification=array(
            'message'=>"services has been deleted",
            'alert-type'=>'success',
        );
        return back()->with($notification);
    }

}
