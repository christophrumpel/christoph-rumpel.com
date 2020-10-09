```php
protected function handle(): void
{
    // ✅ The handle method is what you check first when visiting this class
    // ✅ It is now easy to get an overview of what is happening
    $url = $this->option('url') ?: $this->ask('Please provide the URL for the import:');
    
    $importResponse =  $this->http->get($url);
    
    $this->importUsers($importResponse->results);
    
    $this->saveBackupIfAsked($importResponse);
}

// ✅ If you need more details, you can check the dedicated methods
protected function importUsers($userData): void
{
    $bar = $this->output->createProgressBar(count($userData));
    $bar->start();

    $this->userRepository->truncate();
    collect($userData)->each(function (array $attributes) use ($bar) {
        $this->userRepository->create($attributes);
        $bar->advance();
    });

    $bar->finish();
    $this->output->newLine();

    $this->info('Thanks. Users have been imported.');
}

// ✅ Don't be afraid of more lines of code
// ✅ In this example it makes sense to clean up our main "handle" method
protected function saveBackupIfAsked(Response $response): void
{
    if($this->option('with-backup')) {
        $this->storage
            ->disk('backups')
            ->put(date('Y-m-d').'-import.json', $response->body());

        $this->info('Backup was stored successfully.');
    }
}
```
