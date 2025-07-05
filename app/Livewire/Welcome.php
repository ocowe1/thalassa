<?php

namespace App\Livewire;

use Livewire\Component;

class Welcome extends Component
{

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('welcome');
    }

}
