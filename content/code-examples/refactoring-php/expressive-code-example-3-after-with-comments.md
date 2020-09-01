```php
public function setCodeExamples(string $exampleBefore, string $exampleAfter)
{ 
    // ✅ Our code now tells what we are doing: getting a code example (we do not care how)
    $this->exampleBefore = getCodeExample($exampleBefore);
    $this->exampleAfter = getCodeExample($exampleAfter);
}

// ✅ The new method can be used multiple times now
private function getCodeExample(string $exampleName): string
{
    return file_get_contents(base_path("$exampleName.md"));
}
```
