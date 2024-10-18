<?php

namespace App\Concerns;

use Config;
use File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

trait HasImageVariants
{
    public function makeImgVariants($originalPath): void
    {
        $sizes = Config::get('photos.sizes');
        foreach ($sizes as $size => $value) {
            if (is_null($value)) {
                continue;
            }
            $photo = Image::read(Storage::get($originalPath['photo']));
            if (is_array($value)) {
                $photo->cover($value['width'], $value['height']);
            } else {
                $photo->scale($value);
            }
            $file = str_replace('original', $size, $originalPath['photo']);
            $directory = dirname($file);
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($file, $photo->encode());
        }
    }
}
