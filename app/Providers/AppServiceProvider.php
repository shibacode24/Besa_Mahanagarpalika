<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
            // Register the compressImage function globally
            $this->app->bind('compressImage', function () {
                return function ($filePath, $extension) {
                    if (!file_exists($filePath)) {
                        throw new \Exception("File does not exist: $filePath");
                    }
    
                    switch (strtolower($extension)) {
                        case 'jpeg':
                        case 'jpg':
                            $image = imagecreatefromjpeg($filePath);
                            if ($image === false) {
                                throw new \Exception("Failed to create image from JPEG file.");
                            }
                            break;
    
                        case 'png':
                            $image = imagecreatefrompng($filePath);
                            if ($image === false) {
                                throw new \Exception("Failed to create image from PNG file.");
                            }
                            break;
    
                        default:
                            throw new \Exception("Unsupported image format: $extension");
                    }
    
                    $originalWidth = imagesx($image);
                    $originalHeight = imagesy($image);
    
                    $newWidth = $originalWidth * 0.8;
                    $newHeight = $originalHeight * 0.8;
    
                    $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
    
                    if (strtolower($extension) == 'png') {
                        imagealphablending($resizedImage, false);
                        imagesavealpha($resizedImage, true);
                        $transparent = imagecolorallocatealpha($resizedImage, 255, 255, 255, 127);
                        imagefill($resizedImage, 0, 0, $transparent);
                    }
    
                    imagecopyresampled($resizedImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $originalWidth, $originalHeight);
    
                    switch (strtolower($extension)) {
                        case 'jpeg':
                        case 'jpg':
                            imagejpeg($resizedImage, $filePath, 80);
                            break;
    
                        case 'png':
                            imagepng($resizedImage, $filePath, 8);
                            break;
                    }
    
                    imagedestroy($image);
                    imagedestroy($resizedImage);
                };
            });
        }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
