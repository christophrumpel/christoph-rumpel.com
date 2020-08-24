<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CodeTab extends Component
{

    public string $codeBefore;

    public string $codeBeforeWithComments;

    public string $codeAfter;

    public string $codeAfterWithComments;

    /**
     * Create a new component instance.
     *
     * @param  string  $codeBefore
     * @param  string  $codeBeforeWithComments
     * @param  string  $codeAfter
     * @param  string  $codeAfterWithComments
     */
    public function __construct(
        string $codeBefore,
        string $codeBeforeWithComments,
        string $codeAfter,
        string $codeAfterWithComments
    ) {
        $this->codeBefore = $this->getCodeExample($codeBefore);
        $this->codeBeforeWithComments = $this->getCodeExample($codeBeforeWithComments);
        $this->codeAfter = $this->getCodeExample($codeAfter);
        $this->codeAfterWithComments = $this->getCodeExample($codeAfterWithComments);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.code-tab');
    }

    private function getCodeExample(string $name): string
    {
        return file_get_contents(base_path("content/code-examples/refactoring-php/$name.txt"));
    }
}
