<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Aboutdetail;

class companyController extends Controller
{
  

  public function list(Request $request)
  {
    
    $detail=Aboutdetail::all();
    if ($request->ajax()) {
      return response()->json([
          'detail' => $detail,
      ]);
  } else {
      return view('admin.about_us', compact('detail'));
  }
    // return view('admin.about_us');
    // return view('admin.about_us', ['detail' => $detail]);
  }
  public function store(Request $req)
  {
     $details=new Aboutdetail();

     $details->title=$req->input('title');
     $details->description=$req->input('description');
     $details->subtitle=$req->input('subtitle');
     $details->save();
     return response()->json([
      'status'=>200,
      'message'=>'Details Added Successfully',
     ]);
    //  return redirect()->route('company.list')->with('success','Details Added Successfully');


  }
  public function edit($id)
  {
    $details=Aboutdetail::find($id);
    if($details)
    {
       return response()->json([
        'status'=>200,
        'details'=>$details,
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

    $details=Aboutdetail::Find($id);
    
    if($details)
    {  
      $details->title=$req->input('title');
     $details->description=$req->input('description');
     $details->subtitle=$req->input('subtitle');
     $details->update();
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
      $details=Aboutdetail::find($id);
      $details->delete();
      return response()->json([
        "status"=>200,
        "message"=>"deleted Successfully",
      ]);
    }
}
