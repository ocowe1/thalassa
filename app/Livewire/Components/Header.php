<?php

namespace App\Livewire\Components;

use App\Livewire\BaseComponent;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Header extends BaseComponent
{

    public function render()
    {
        return view('layouts.header');
    }

}
