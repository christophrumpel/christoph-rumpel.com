```php
class PdfExporter
{
    // ❌ "handle" and "export" are similar methods with different names
    public function handle(Collection $items): void
    {
        // export items...
    }
}

class CsvExporter
{
    public function export(Collection $items): void
    {
        // export items...
    }
}

// ❌ While using them you will question if they even perform similar tasks
// ❌ I bet you will look up the classes to make sure
$pdfExport->handle();
$csvExporter->export();
```
