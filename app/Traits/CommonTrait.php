<?php

namespace App\Traits;

use App\Models\Payment\Stripe;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait CommonTrait
{
    public function getMime($ext)
    {
        $mime_list = [
            "jpg" => "image/jpg",
            "png" => "image/png",
            "jpeg" => "image/jpeg",
            "svg" => "image/svg+xml"
        ];
        return $mime_list[$ext];
    }

    public function uploadImg($file, $dir, $fileName = null, $url = false)
    {
        if (empty($fileName)) {
            $fileName = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            //  $fileName = str_replace(['#', '/', '\\', ' '], '-', $fileName);
            $name = pathinfo($fileName, PATHINFO_FILENAME);
            $fileName = $name . '-' . time() . '.' . $ext;
        }
        $file_path = 'public/' . $dir . '/' . $fileName;
        $upload_dir = 'public/' . $dir;
        if ($url) {
            if (Storage::put($file_path, $file)) {
                return Storage::url($file_path);
            }
        } else {
            if (Storage::putFileAs($upload_dir, $file, $fileName)) {
                return Storage::url($file_path);
            }
        }
        return false;
    }

    public function uploadBase64Image($base64_image)
    {
        $extension = explode('/', explode(':', substr($base64_image, 0, strpos($base64_image, ';')))[1])[1];   // .jpg .png .pdf
        $replace = substr($base64_image, 0, strpos($base64_image, ',') + 1);
        $image = str_replace($replace, '', $base64_image);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10) . '.' . $extension;
        Storage::disk('public')->put($imageName, base64_decode($image));
    }

    public function callApi($api_url, $method = 'GET', $postData = null)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'charset: UTF-8'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $res = json_decode($response, true);
        return $res;
    }
}
