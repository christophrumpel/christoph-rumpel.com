```php
public function sendInvoice(Invoice $invoice): bool
{
    if($user->notificationChannel === 'Slack')
    {
        return $this->notifier->slack($invoice);
    }

    return $this->notifier->email($invoice);
}
```
