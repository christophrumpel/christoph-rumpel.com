```php
return collect($this->playedGames)
    ->sum('score');
```
