<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('galleries.index', [
            'galleries' => Gallery::query()->latest()->paginate(20),
        ]);
    }
}
