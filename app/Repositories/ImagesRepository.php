<?php
namespace App\Repositories; //bien penser au namespace

use Illuminate\Http\UploadedFile;

class ImagesRepository implements ImagesRepositoryInterface
{
    public function save(UploadedFile $image)
    {
        $image->store(config('images.path'), 'public'); //ce qui était dans le controller
         $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/img');
        $image->move($destinationPath, $name);
        // $this->save();
    }
}