<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->image){
            $ext = $request->image->extension();
            if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg'){
                $data = file_get_contents($request->image);
                $base64 = 'data:image/'.$ext.';base64'.base64_encode($data);
                return response()->json($base64, 201);
            }
            return response()->json('imagem invalida', 400);
        }
        return response()->json('sem imagem', 201);
    }
}
