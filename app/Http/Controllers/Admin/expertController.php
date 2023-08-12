<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class expertController extends Controller
{
    public function list(Request $request)
    {
      $experts=Expert::all();
     
      foreach ($experts as $expert) {
        $expert->logo_url = Storage::url($expert->logo);
    }

      if ($request->ajax()) {
        return response()->json([
            'experts' => $experts,
        ]);
        
    } else {
        return view('admin.expert', compact('experts'));
    }
    }
    public function store(Request $request)
    {   


     
      $request->validate([
        // Add validation rules for other client fields if needed
        'logo' => 'required',
    ]);

    // Get the uploaded file
    $logoFile = $request->file('logo');

    // Store the file in a public directory (you can change the path as per your needs)
    $logoPath = $logoFile->store('public/images');

    // Create a new Client instance and store the client information
    $expert = new Expert();
    
    // Add other client data here if you have more fields to save
    $expert->logo = $logoPath;
    $expert->save();
    

    return response()->json(['status' => 200, 'message' => 'Technology added successfully']);
    //   dd($request);
  //   $file=$request->has->file('logo');
  //      $data = $request->validate([
  //       // Other validation rules for your form fields
  //      'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
  //      ]);
  //      $fileName=time().''.$file->getClientOriginalname();
  //      $file->storeAs('images',$fileName,'public');
   
  //       // $imagePath = $request->file('logo')->store('public/images');
      
  
  //   $clients=new Client();
  //  $clients->logo=$imagePat;
  //      $clients->save();
  //      return response()->json([
  //       'status'=>200,
  //       'message'=>'Logo Added Successfully',
  //      ]);
      //  return redirect()->route('company.list')->with('success','Details Added Successfully');
  
   }
   public function edit($id)
   {
     $experts=Expert::find($id);
     if($experts)
     {
        return response()->json([
         'status'=>200,
         'experts'=>$experts,
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
   public function update(Request $request, $id)
   {
       
   }
   
    public function delete($id)
      {
        $experts=Expert::find($id);
        $experts->delete();
        return response()->json([
          "status"=>200,
          "message"=>"deleted Successfully",
        ]);
      }
}
