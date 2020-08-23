<?php

namespace App;

use League\CommonMark\Block\Element\AbstractBlock;
use League\CommonMark\Cursor;

class TabbedCodeBlock extends AbstractBlock
{

    private $objectId;

    public function __construct($objectId)
    {
        $this->objectId = $objectId;
    }

    public function getObjectId()
    {
        return $this->objectId;
    }

    public function canContain(AbstractBlock $block): bool
    {
        return true;
    }

    public function acceptsLines()
    {
        return false;
    }

    public function isCode(): bool
    {
        return false;
    }

    public function matchesNextLine(Cursor $cursor): bool
    {
        return true;
    }
}
