```php
$score = 0;

foreach($this->playedGames as $game) {
    $score += $game->score;
}

return $score;
```
