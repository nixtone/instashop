<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

// v.1
trait HasFile
{
    // php artisan storage:link

    public array $acceptedFileFormats = [
        'image' => '.jpg, .jpeg, .png, .webp, .pdf',
    ];

    private function path(): string
    {
        return strtolower(class_basename($this)).'/'.$this->id;
    }

    public function getFiles($folder = '')
    {
        $arFiles = collect();
        $storagePath = match (env('FILESYSTEM_DISK')) {
            'local' => '',
            'public' => '/storage/',
            's3' => env('AWS_URL').'/'.env('AWS_BUCKET').'/'
        };
        foreach (Storage::files($this->path().'/'.$folder) as $file) {
            $arFiles->put(
                basename($file),
                $storagePath.$file
            );
        }

        return $arFiles;
    }

    public function getFile($folder = '')
    {
        return $this->getFiles($folder)->first();
    }

    public function uploadFile($validated)
    {
        $status = [];
        foreach ($validated as $fieldName => $file) {
            if (! is_array($file)) {
                $file = [$file];
            }
            if ($file instanceof \Illuminate\Http\UploadedFile) {
                unset($validated[$fieldName]);
                foreach ($file as $singleFile) {
                    if ($singleFile->isValid()) {
                        $path = $this->path()."/{$fieldName}/".$singleFile->getClientOriginalName();

                        /*
                        $img = null;
                        // Обработка изображений
                        if (in_array($singleFile->getMimeType(), ['image/jpeg', 'image/png'])) {
                            $maxWidth = 1200;
                            $maxHeight = 800;
                            $manager = new ImageManager(new Driver);
                            $img = $manager->read($singleFile->getRealPath());
                            $isPortrait = $img->height() > $img->width();
                            if ($isPortrait) {
                                if ($img->height() > $maxHeight) {
                                    $img->scale(height: $maxHeight);
                                }
                            } else {
                                if ($img->width() > $maxWidth) {
                                    $img->scale(width: $maxWidth);
                                }
                            }
                        }
                        */

                        // загрузка
                        $status[] = $singleFile->getClientOriginalName().(Storage::put(
                            $path,
                            // ($img ? $img->encode() : file_get_contents($singleFile))
                            file_get_contents($singleFile)
                        ) ? ' успешно загружен' : ' не удалось загрузить');

                        //  $uploadMessages[] = $fileName.($uploadStatus ? ' успешно загружен' : ' не удалось загрузить');
                    }
                }
            }
        }

        return [
            'validated' => $validated,
            'status' => $status,
        ];
    }

    public function deleteFile($folder = '', $file = null)
    {
        $path = $this->path().'/'.$folder;

        return $file === null ? Storage::deleteDirectory($path) : Storage::delete($path.'/'.$file);
    }
}
