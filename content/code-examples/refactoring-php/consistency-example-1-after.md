```php
interface Exporter
{
    public function export(Collection $items): void;
}

class PdfExporter implements Exporter
{
    public function export(Collection $items): void
    {
        // export items...
    }
}

class CavExporter implements Exporter
{
    public function export(Collection $items): void
    {
        // export items...
    }
}

$pdfExport->export();
$csvExporter->export();
```
