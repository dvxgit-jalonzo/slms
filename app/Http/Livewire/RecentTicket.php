<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RecentTicket extends Component
{
    public $recentTickets;

    public function render()
    {
        return view('livewire.recent-ticket');
    }
}
