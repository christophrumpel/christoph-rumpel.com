```php
public function calculateScore(User $user): int
{
    if ($user->inactive) {
        $score = 0;
    } else {
        // ❌ What was "if" again?
        if ($user->hasBonus) {
            $score = $user->score + $this->bonus;
        } else {
            // ❌ Your 👀 are constantly moving due to the different idention levels
            $score = $user->score;
        }
    }

    return $score;
}
```
