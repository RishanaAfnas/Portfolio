<?php

namespace App\Http\Controllers;

use App\Models\Aboutdetail;
use App\Models\Client;
use App\Models\Expert;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class homeController extends Controller
{
    public function index()
    {


        $details=Aboutdetail::all();
        $services=Service::all();
        $clients=Client::all();
        foreach ($clients as $client) {
            $client->logo = Storage::url($client->logo);
        }
    
        $testimonials=Testimonial::all();
        foreach ($testimonials as $testimonial) {
            $testimonial->image = Storage::url($testimonial->image);
        }
        $experts=Expert::all();
        foreach ($experts as $expert) {
            $expert->logo = Storage::url($expert->logo);
        }
    
       
        return view('layout.home',compact('details','services','clients','testimonials','experts'));
        
    }
   
}
