<?php

namespace App\Http\Livewire;

use App\Models\Agency;
use Livewire\Component;

class ShowLogo extends Component
{
    public function render()
    {
        $pathLogo = Agency::query()->where('id', auth()->user()->agency_id)->first()['logo_path'];
        
        return view('livewire.show-logo', ['pathLogo' => $pathLogo]);
    }
}
