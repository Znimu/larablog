<?php

namespace App\Http\Controllers;

use App\Repositories\ImagesRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\ImagesRequest;
use App\Events\NewImage;

class ImageController extends Controller
{

    public function new()
    {
        return view('image_upload');
    }

    public function store(ImagesRequest $request, ImagesRepositoryInterface $imagesRepository)
    {
        if ($request->hasFile('img1')) {
            $imagesRepository->save($request->img1);
            event(new NewImage);

            return view('image_uploaded');
        }
        else {
            echo "Error... file not found.";
        }
    }
}
