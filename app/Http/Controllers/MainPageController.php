<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class MainPageController extends Controller
{
    public function __invoke(): View
    {
        return view('main', [
            'oldCampaigns' => Campaign::query()->where('is_old', true)->latest()->limit(4)->get(),
            'newCampaigns' => Campaign::query()->where('is_old', false)->latest()->limit(4)->get(),
            'galleries' => Gallery::query()->latest()->limit(10)->get(),
            'posts' => Post::query()->latest()->limit(4)->get(),
        ]);
    }
}
