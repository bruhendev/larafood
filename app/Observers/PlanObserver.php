<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the Plan "created" event.
     */
    public function creating(Plan $plan): void
    {
        $plan->url = Str::slug($plan->name);
    }

    /**
     * Handle the Plan "updated" event.
     */
    public function updating(Plan $plan): void
    {
        $plan->url = Str::slug($plan->name);
    }

}
