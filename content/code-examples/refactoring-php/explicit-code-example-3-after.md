```php
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
