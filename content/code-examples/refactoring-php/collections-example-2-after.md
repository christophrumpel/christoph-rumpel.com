```php
$users = [
    [ 'id' => 801, 'name' => 'Peter', 'score' => 505, 'active' => true],
    [ 'id' => 844, 'name' => 'Mary', 'score' => 104, 'active' => true],
    [ 'id' => 542, 'name' => 'Norman', 'score' => 104, 'active' => false],
];

// Requested Result: only active users, sorted by score ["Mary(704)","Peter(505)"]

return collect($users)
  ->filter(fn($user) => $user['active'])
  ->sortBy('score')
  ->map(fn($user) => "{$user['name']} ({$user['score']})"
  ->values()
  ->toArray();
```
