```php
protected function handle()
{
    // ❌ The method contains too much code
    $url = $this->option('url') ?: $this->ask('Please provide the URL for the import:');
    
    $importResponse =  $this->http->get($url);
    
    // ❌ The progress bar output is useful for the user but makes our code messy
    $bar = $this->output->createProgressBar($importResponse->count());
    $bar->start();
    
    $this->userRepository->truncate();
    collect($importResponse->results)->each(function (array $attributes) use ($bar) {
        $this->userRepository->create($attributes);
        $bar->advance();
    });
    
    // ❌ It is difficult to tell which actions are being taken here
    $bar->finish();
    $this->output->newLine();

    $this->info('Thanks. Users have been imported.');
    
    if($this->option('with-backup')) {
        $this->storage
            ->disk('backups')
            ->put(date('Y-m-d').'-import.json', $response->body());

        $this->info('Backup was stored successfully.');
    }
  
}
```
