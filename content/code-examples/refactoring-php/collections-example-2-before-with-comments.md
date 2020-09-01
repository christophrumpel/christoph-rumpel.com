```php
$users = [
    [ 'id' => 801, 'name' => 'Peter', 'score' => 505, 'active' => true],
    [ 'id' => 844, 'name' => 'Mary', 'score' => 704, 'active' => true],
    [ 'id' => 542, 'name' => 'Norman', 'score' => 104, 'active' => false],
];

// Requested Result: only active users, sorted by score ["Mary(704)","Peter(505)"]

$users = array_filter($users, fn ($user) => $user['active']);

// ❌ Which is "usort" again? How does the condition work?
usort($users, fn($a, $b) => $a['score'] < $b['score']);

// ❌ All the transformations are separated, still they all are about users
$userHighScoreTitles = array_map(fn($user) => $user['name'] . '(' . $user['score'] . ')', $users);

return $userHighScoreTitles;
