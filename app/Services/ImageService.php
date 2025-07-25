<?php
namespace App\Services;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function uploadImage(
        UploadedFile $file,
        Model $model,
        string $disk = 'public',
        ?string $directory = 'images'
    ): Image {
        $path = $file->store($directory, $disk);
        $image = new Image([
            'path' => $path,
        ]);
        $model->image()->save($image);
        return $image;
    }
}
