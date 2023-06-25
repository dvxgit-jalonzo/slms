<?php

namespace App\Http\Livewire;

use App\Models\Software;
use Livewire\Component;
use Livewire\WithPagination;

class ListSoftware extends Component
{
    use WithPagination;


    public function render()
    {
        $softwares = Software::all();
        return view('livewire.list-software', compact('softwares'));
    }
}
