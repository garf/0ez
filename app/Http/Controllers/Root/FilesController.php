<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\JsonResponse;

class FilesController extends Controller
{
    public function uploadImageAjax(Request $request)
    {
        $path = public_path('upload');

        if ($request->ajax()) {
            $file = $request->file('fileToUpload');

            $filename = generate_filename($path, $file->getClientOriginalExtension());

            try {
                $file->move($path, $filename);
                $file = '/upload/'.$filename;
                $data = [
                    'message' => 'uploadSuccess',
                    'file'    => $file,
                ];
            } catch (FileException $e) {
                $data = [
                    'message' => 'uploadError',
                ];
            }
        } else {
            $data = [
                'message'  => 'uploadNotAjax',
                'formData' => Input::all(),
            ];
        }

        return new JsonResponse($data);
    }
}
