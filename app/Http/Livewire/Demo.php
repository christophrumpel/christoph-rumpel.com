<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Demo extends Component
{

    public $demo = '';

    protected $queryString = ['demo'];

    public function render()
    {
        return view('livewire.demo');
    }
}
