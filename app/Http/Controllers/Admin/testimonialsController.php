<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class testimonialsController extends Controller
{
    
  public function list(Request $request)
  {
    $testimonials=Testimonial::all();

    foreach ($testimonials as $testimonial) {
        $testimonial->imageUrl =Storage::url($testimonial->image);
    }

    if ($request->ajax()) {
      return response()->json([
          'testimonials' => $testimonials,
      ]);

  } else {
      return view('admin.testimonials', compact('testimonials'));
  }
  }
//   public function store(Request $req)
//   {

//     $imageFile = $req->file('image');

//     // Store the file in a public directory (you can change the path as per your needs)
//     $imagePath = $imageFile->store('public/images');
//      $testimonials=new Testimonial();
     
   
//      $testimonials->image=$req->$imagePath;
     
//      $testimonials->name=$req->input('name');
//      $testimonials->profession=$req->input('profession');
    
//      $testimonials->description=$req->input('description');
//      $testimonials->save();
//      return response()->json([
//       'status'=>200,
//       'message'=>'Details Added Successfully',
//      ]);
//     //  return redirect()->route('company.list')->with('success','Details Added Successfully');

//  }
public function store(Request $req)
{
    $imageFile = $req->file('image');

    // Store the file in a public directory (you can change the path as per your needs)
    $imagePath = $imageFile->store('public/images');

    $testimonials = new Testimonial();
    $testimonials->image = $imagePath; // Store the file path in the 'image' field

    $testimonials->name = $req->input('name');
    $testimonials->profession = $req->input('profession');
    $testimonials->description = $req->input('description');
    $testimonials->save();

    return response()->json([
        'status' => 200,
        'message' => 'Details Added Successfully',
    ]);
}

 public function edit($id)
 {
   $testimonials=Testimonial::find($id);
   if($testimonials)
   {
      return response()->json([
       'status'=>200,
       'testimonials'=>$testimonials,
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

    $testimonials=Testimonial::Find($id);
    
    if($testimonials)
    {  
        $testimonials->name=$req->input('name');
        $testimonials->profession=$req->input('profession');
      
        $testimonials->description=$req->input('description');
        $testimonials->update();
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
      $testimonials=Testimonial::find($id);
      $testimonials->delete();
      return response()->json([
        "status"=>200,
        "message"=>"deleted Successfully",
      ]);
    }
}
