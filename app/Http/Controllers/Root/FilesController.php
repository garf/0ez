<?php

namespace App\Http\Controllers\Root;


use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Input;

class FilesController extends Controller
{

    public function uploadImageAjax(Request $request)
    {
        $path = public_path('upload');

        if($request->ajax()) {

            $file = $request->file('fileToUpload');

            $filename = generate_filename($path, $file->getClientOriginalExtension());

            try {
                $file->move($path, $filename);
                $file = '/upload/' . $filename;
                $data = array(
                    'message' => 'uploadSuccess',
                    'file'    => $file,
                );
            } catch (FileException $e) {
                $data = array(
                    'message' => 'uploadError',
                );
            }

        } else {
            $data = array(
                'message' => 'uploadNotAjax',
                'formData' => Input::all()
            );
        }
        return new JsonResponse($data);
    }

}
