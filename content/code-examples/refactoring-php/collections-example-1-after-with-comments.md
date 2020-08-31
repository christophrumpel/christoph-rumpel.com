```php
// ✅ The collection is an object with methods
// ✅ The sum method makes it more expressive
return collect($this->playedGames)
    ->sum('score');
```
