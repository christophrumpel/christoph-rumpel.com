```php
class PdfExporter
{
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

$pdfExport->handle();
$csvExporter->export();
```
