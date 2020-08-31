```php
// ❌ Here we have a temporary variable
$score = 0;

// ❌ It is ok to use a loop, but it could be more readable
foreach($this->playedGames as $game) {
    $score += $game->score;
}

return $score;
```
