<?php

namespace App;

use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Cursor;

class TabbedCodeBlock extends AbstractBlock
{

    public function canContain(AbstractBlock $block): bool
    {
        // TODO: Implement canContain() method.
    }

    public function isCode(): bool
    {
        // TODO: Implement isCode() method.
    }

    public function matchesNextLine(Cursor $cursor): bool
    {
        // TODO: Implement matchesNextLine() method.
    }
}
