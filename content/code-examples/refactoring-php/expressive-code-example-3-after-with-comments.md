```php
// ✅ Our code now tells what we are doing: getting a code example (we do not care how)
// ✅ The new method can be used twice which means less code
public function __construct(string $exampleCodeBeforeName, string $exampleCodeAfterName)
{
    $this->exampleCodeBefore = $this->getCodeExample($exampleCodeBeforeName, 'before');
    $this->exampleCodeAfter = $this->getCodeExample($exampleCodeAfterName, 'after');
}

private function getCodeExample(string $exampleName, string $type): string
{
    return file_get_contents(base_path("$name-$type.txt"));
}
```
