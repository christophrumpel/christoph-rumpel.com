<?php

namespace App;

use League\CommonMark\Block\Parser\BlockParserInterface;
use League\CommonMark\ContextInterface;
use League\CommonMark\Cursor;

class TabbedCodeParser implements BlockParserInterface
{

    public function parse(ContextInterface $context, Cursor $cursor): bool
    {

        if ($cursor->isIndented()) {
            return false;
        }

        $c = $cursor->getCharacter();
        if ($c !== ' ' && $c !== "\t" && $c !== '`' && $c !== '~') {
            return false;
        }

        if($cursor->getLine() === 'xxx'){
            dd('here');
            return true;
        }

        return false;

    }
}
