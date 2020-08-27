<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CodeTabCommentBtn extends Component
{
    public string $btnText;

    public string $tabState;

    /**
     * Create a new component instance.
     *
     * @param  string  $btnText
     * @param  string  $tabState
     */
    public function __construct(string $btnText, string $tabState)
    {
        $this->btnText = $btnText;
        $this->tabState = $tabState;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.code-tab-comment-btn');
    }
}
