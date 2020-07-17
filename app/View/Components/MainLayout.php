<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class MainLayout extends Component
{
    public $post;

    public string $title;

    public string $page;

    public $livewire;

    public function __construct($post = null, $title = null, $page = '', $livewire = false)
    {
        $this->post = $post;
        $this->title = $title ? $title.' - Christoph Rumpel' : 'Christoph Rumpel';
        $this->page = $page;
        $this->livewire = $livewire;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('layouts.main');
    }
}
