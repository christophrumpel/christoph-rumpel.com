```php
$users = [
    [ 'id' => 801, 'name' => 'Peter', 'score' => 505, 'active' => true],
    [ 'id' => 844, 'name' => 'Mary', 'score' => 104, 'active' => true],
    [ 'id' => 542, 'name' => 'Norman', 'score' => 104, 'active' => false],
];

// Requested Result: only active users, sorted by score ["Mary(704)","Peter(505)"]

// ✅ We are passing users only once
return collect($users)
    // ✅ We are piping them through all methods
  ->filter(fn($user) => $user['active'])
  ->sortBy('score')
  ->transform(fn($user) => $user['name']. ' ('.$user['score'].')')
  ->values()
    // ✅ At the end, we return an array
  ->toArray();
```
