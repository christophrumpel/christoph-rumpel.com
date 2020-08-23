<?php

namespace App;

use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Block\Renderer\BlockRendererInterface;
use League\CommonMark\ElementRendererInterface;
use League\CommonMark\HtmlElement;

class TabbedCodeRenderer implements BlockRendererInterface
{
    public function render(AbstractBlock $block, ElementRendererInterface $htmlRenderer, $inTightList = false)
    {
        $span = sprintf('<span>%s</span>', $block->getObjectId());
        $contents = $htmlRenderer->renderBlocks($block->children());

        return new HtmlElement('div', ['class' => 'object'],
            $span . $contents
        );
    }
}
