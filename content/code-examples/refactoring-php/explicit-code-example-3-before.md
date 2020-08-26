```php
public function __construct(string $exampleCodeBeforeName, string $exampleCodeAfterName)
{
    $this->exampleCodeBefore = file_get_contents(base_path("$name-before.txt"));
    $this->exampleCodeAfter = file_get_contents(base_path("$name-after.txt"));
}
```
