```php
// ❌ Duplicated code (methods "file_get_contents" and "base_path" and fiel path and extension)
// ❌ At this point we don't care HOW we get the code examples
public function __construct(string $exampleCodeBeforeName, string $exampleCodeAfterName)
{
    $this->exampleCodeBefore = file_get_contents(base_path("$name-before.txt"));
    $this->exampleCodeAfter = file_get_contents(base_path("$name-after.txt"));
}
```
