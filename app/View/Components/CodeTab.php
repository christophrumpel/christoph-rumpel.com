<?php

namespace App\View\Components;

use Illuminate\View\Component;
use League\CommonMark\CommonMarkConverter;

class CodeTab extends Component
{
    public string $codeName;

    /**
     * Create a new component instance.
     *
     * @param  string  $codeName
     */
    public function __construct(string $codeName)
    {
        $this->codeName = $codeName;
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

    public function codeExampleBefore(): string
    {
        return $this->getCodeExample($this->codeName.'-before');
    }

    public function codeExampleBeforeWithComments(): string
    {
        return $this->getCodeExample($this->codeName.'-before-with-comments');
    }

    public function codeExampleAfter(): string
    {
        return $this->getCodeExample($this->codeName.'-after');
    }

    public function codeExampleAfterWithComments(): string
    {
        return $this->getCodeExample($this->codeName.'-after-with-comments');
    }

    private function getCodeExample(string $name): string
    {
        $codeExample = file_get_contents(base_path("content/code-examples/refactoring-php/$name.md"));

        return app(CommonMarkConverter::class)->convertToHtml($codeExample);
    }
}
