```php
public function sendInvoice(Invoice $invoice): void
{
    if($user->notificationChannel === 'Slack')
    {
        $this->notifier->slack($invoice);
    } else {
        $this->notifier->email($invoice);
    }
}
```
