<?php

namespace App\Classes;

use App\Interfaces\FileStorageType;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Intervention\Image\Facades\Image;

class CloudinaryClass implements FileStorageType 
{
    // public function storeFile($file,$folderPath=null)
    // {
    //     $uploadedFileUrl = Cloudinary::upload($file->getRealPath(), [
    //         'folder' => $folderPath,
    //     ])->getSecurePath();
    //     return base64_encode($uploadedFileUrl);
    // }

    public function storeFile($file,$folderPath=null)
    {
        // Load the image into Intervention Image
        $image = Image::make($file->getRealPath());

        // Crop the image (x, y, width, height)
        // $image->crop(300, 300, 100, 100);

        // Optionally resize the image to a reasonable size if it's very large
        $image->resize(1200, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        
        // Get the cropped image as a stream
        $imageStream = $image->stream('jpg');
        $base64Image = base64_encode($imageStream);
        $uploadedFileUrl = Cloudinary::upload("data:image/jpeg;base64," . $base64Image, [
            'folder' => $folderPath,
            'transformation' => [
                'quality' => 'auto:good',
                'fetch_format' => 'auto',
            ],
        ])->getSecurePath();
        // $uploadedFileUrl = Cloudinary::upload($file->getRealPath(), [
        //     'folder' => $folderPath,
        //     'quality' => 'auto:low',        // Adjusts quality automatically
        //     'fetch_format' => 'auto',       // Automatically chooses the optimal image format
        //     'width' => 800,                 // Resize the image (optional)
        //     'crop' => 'scale'               // Maintains aspect ratio while resizing
        // ])->getSecurePath();
        return base64_encode($uploadedFileUrl);
    }

    public function retriveFile($fileUrl)
    {
        $decodedFileUrl = base64_decode($fileUrl);
    }
}