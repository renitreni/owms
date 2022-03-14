<?php

namespace App\Http\Livewire;

use App\Models\Agency;
use Livewire\Component;
use Throwable;

class ShowLogo extends Component
{
    public function render()
    {
        try {
        
            $pathLogo = Agency::query()->where('id', auth()->user()->agency_id)->first()['logo_path'];
        } catch (Throwable $e) {
            report($e);
            $pathLogo = '';
        }
        
        return view('livewire.show-logo', ['pathLogo' => $pathLogo]);
    }
}
