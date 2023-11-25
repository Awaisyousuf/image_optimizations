<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ImageOptiController extends Controller
{
    public function index()
    {
        return view("index");
    }
    public function store(Request $request)
    {
        if ($request->hasFile("image")) {
            // $image = $request->file("image")->getClientOriginalName();
            // $imagePath = pathinfo( $image, PATHINFO_DIRNAME);

            $imageName = "Compressed_images/" . Str::uuid() . ".jpg";
            Image::make($request->image)->resize(320, 240)->save($imageName, 20);

            return back()->with("success", "it's working");
        } else {
            return redirect()->back()->with("error", "it's not working");
        }
    }
}
