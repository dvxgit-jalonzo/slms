<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RecentAddedClient extends Component
{
    public $recentClients;

    public function render()
    {
        return view('livewire.recent-added-client');
    }
}
