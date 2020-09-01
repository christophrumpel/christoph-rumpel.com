```php
public function sendInvoice(Invoice $invoice): void
{
    if($user->notificationChannel === 'Slack')
    {
        $this->notifier->slack($invoice);
    } else {
        // ❌ Even a simple ELSE effects the readability of your code
        $this->notifier->email($invoice);
    }
}
```
