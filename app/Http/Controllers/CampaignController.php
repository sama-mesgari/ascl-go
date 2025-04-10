<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Contracts\View\View;

class CampaignController extends Controller
{
    public function index()
    {
        return view('campaigns.index', [
            'campaigns' => Campaign::query()->latest()->where('is_old', request()->get('is_old', false))->paginate(10)
        ]);
    }

    public function show(Campaign $campaign): View
    {
        return view('campaigns.show', [
            'campaign' => $campaign
        ]);
    }
}
