```php
// ❌ Multiple where clauses make it difficult to read
// ❌ What is the purpose?
User::<hljs general>whereNotNull('subscribed')->where('status', 'active')</hljs>;
```
