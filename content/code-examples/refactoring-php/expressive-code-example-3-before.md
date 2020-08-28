```php
public function setCodeExamples(string $exampleBefore, string $exampleAfter)
{
    $this->exampleBefore = file_get_contents(base_path("$exampleBefore.md"));
    $this->exampleAfter = file_get_contents(base_path("$exampleAfter.md"));
}
```
