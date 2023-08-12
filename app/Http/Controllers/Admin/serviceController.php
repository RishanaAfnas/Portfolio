<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Service;
use Illuminate\Http\Request;

class serviceController extends Controller
{
  public function list(Request $request)
  {
    $services=Service::all();
    if ($request->ajax()) {
      return response()->json([
          'services' => $services,
      ]);
  } else {
      return view('admin.services', compact('services'));
  }
  }
  public function store(Request $req)
  {
     $services=new Service();

     $services->title=$req->input('title');
     $services->icon=$req->input('icon');
     $services->description=$req->input('description');
     $services->save();
     return response()->json([
      'status'=>200,
      'message'=>'Details Added Successfully',
     ]);
    //  return redirect()->route('company.list')->with('success','Details Added Successfully');

 }
 public function edit($id)
 {
   $services=Service::find($id);
   if($services)
   {
      return response()->json([
       'status'=>200,
       'services'=>$services,
      ]);
   }
   else
   {
     return response()->json([
       'status'=>404,
       'message'=>'Data not found',
      ]);
   }
 }
 public function update(Request $req,$id)
  {

    $services=Service::Find($id);
    
    if($services)
    {  
      $services->title=$req->input('title');
      $services->icon=$req->input('icon');
     $services->description=$req->input('description');
   
     $services->update();
     return response()->json([
      'status'=>200,
      'message'=>'updated Successfully',
     ]);
      
    }
    else
    {
      return response()->json([
        'status'=>404,
        'message'=>'Data not found',
       ]);
    }
  }
  public function delete($id)
    {
      $services=Service::find($id);
      $services->delete();
      return response()->json([
        "status"=>200,
        "message"=>"deleted Successfully",
      ]);
    }

}
