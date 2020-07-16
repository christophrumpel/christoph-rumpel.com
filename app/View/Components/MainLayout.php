<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class MainLayout extends Component
{
    public $post;

    public string $title;

    public function __construct($post = null, $title = null)
    {
        $this->post = $post;
        $this->title = $title ? $title.' - Christoph Rumpel' : 'Christoph Rumpel';
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
