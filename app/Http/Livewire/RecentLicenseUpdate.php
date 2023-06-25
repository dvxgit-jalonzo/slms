<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RecentLicenseUpdate extends Component
{
    public $recentLicenses;

    public function render()
    {
        return view('livewire.recent-license-update');
    }
}
