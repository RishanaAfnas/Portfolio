<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class clientsController extends Controller
{
    public function list(Request $request)
    {
      $clients=Client::all();
      foreach ($clients as $client) {
        $client->logo_url = Storage::url($client->logo);
    }

      if ($request->ajax()) {
        return response()->json([
            'clients' => $clients,
        ]);
    } else {
        return view('admin.clients', compact('clients'));
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
    $client = new Client();
    
    // Add other client data here if you have more fields to save
    $client->logo = $logoPath;
    $client->save();
    

    return response()->json(['status' => 200, 'message' => 'Client added successfully']);
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
     $clients=Client::find($id);
     if($clients)
     {
        return response()->json([
         'status'=>200,
         'clients'=>$clients,
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
        $clients=Client::find($id);
        $clients->delete();
        return response()->json([
          "status"=>200,
          "message"=>"deleted Successfully",
        ]);
      }
}
