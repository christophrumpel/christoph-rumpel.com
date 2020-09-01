```php
public function sendInvoice(Invoice $invoice): bool
{
    if($user->notificationChannel === 'Slack')
    {
        return $this->slackNotifier->send($invoice);
    }

    return $this->notifier->send($invoice);
}
```
