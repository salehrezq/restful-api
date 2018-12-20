<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FilesController extends Controller
{
    /**
     * GET
     * http://localhost:8000/api/files/get
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function show()
    {
        return response()->download(storage_path('app\dice.jpg'), 'Lonely dice');
    }
}
