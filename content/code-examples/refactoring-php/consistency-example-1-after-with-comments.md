```php
// ✅ An interface can help with consistency by providing common rules
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

// ✅ Same method names for similar tasks will make it easier to read
// ✅ I'm pretty sure, without taking a look at the classes, they both export data
$pdfExport->export();
$csvExporter->export();
```
