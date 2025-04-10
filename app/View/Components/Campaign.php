<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Campaign extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        private readonly \App\Models\Campaign $campaign
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $campaign = $this->campaign;

        return view('components.campaign', [
            'campaign' => $campaign,
            'percentage' => ceil(($campaign->raised_amount / $campaign->goal_amount) * 100)
        ]);
    }
}
