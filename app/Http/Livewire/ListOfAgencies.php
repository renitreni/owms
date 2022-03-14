<?php

namespace App\Http\Livewire;

use App\Models\Agency;
use Livewire\Component;

class ListOfAgencies extends Component
{
    public $agencies;

    public function mount()
    {
        $this->agencies = Agency::all()->toArray();
    }

    public function render()
    {
        return view('livewire.list-of-agencies')->layout('layouts.guest');
    }
}
