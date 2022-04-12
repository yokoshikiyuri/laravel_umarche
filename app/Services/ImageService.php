<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use InterventionImage;

class ImageService
{
  public static function upload($imageFile, $folderName){

    $fileName = uniqid(rand() . '_'); //「ランダム数値_」に続いて13文字で生成された文字列
    $extension = $imageFile->extension(); //extension() 拡張子を取得するメソッド
    $fileNameToStore = $fileName . '.' . $extension;

    $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();

    Storage::put('public/' . $folderName . '/' . $fileNameToStore, $resizedImage); //$resizedImageはIntervention\Image\Image

    return $fileNameToStore;
  }
}
