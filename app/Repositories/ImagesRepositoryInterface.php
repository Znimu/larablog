<?php
namespace App\Repositories;
use Illuminate\Http\UploadedFile;

interface ImagesRepositoryInterface
{
    public function save(UploadedFile $image);
}