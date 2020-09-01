```php
public function setCodeExamples(string $exampleBefore, string $exampleAfter)
{
    $this->exampleBefore = getCodeExample($exampleBefore);
    $this->exampleAfter = getCodeExample($exampleAfter);
}

private function getCodeExample(string $exampleName): string
{
    return file_get_contents(base_path("$exampleName.md"));
}
```
