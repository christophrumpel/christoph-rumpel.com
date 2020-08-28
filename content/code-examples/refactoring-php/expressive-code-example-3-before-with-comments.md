```php
// ❌ Duplicated code (methods "file_get_contents", "base_path" and file extension)
// ❌ At this point we don't care HOW we get the code examples
public function setCodeExamples(string $exampleBefore, string $exampleAfter)
{
    $this->exampleBefore = file_get_contents(base_path("$exampleBefore.md"));
    $this->exampleAfter = file_get_contents(base_path("$exampleAfter.md"));
}
```

