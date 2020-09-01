```php
public function sendInvoice(Invoice $invoice): bool
{
    // ✅ Every condition is easy to read
    if($user->notificationChannel === 'Slack')
    {
        return $this->notifier->slack($invoice);
    }

    // ✅ No more thinking about what ELSE refers to
    return $this->notifier->email($invoice);
}
```
