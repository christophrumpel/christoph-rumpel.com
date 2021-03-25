<div class="form-field">
    <p>Send an authenticated <code>POST</code> request to the following endpoint with an array of subscriber ids, make sure you've set up the <a class="link" href="https://spatie.be/docs/laravel-mailcoach/v4/api/introduction">Mailcoach API</a>.</p>
    <p class="max-w-full overflow-x-auto bg-blue-100 p-2"><code class="whitespace-nowrap">{{ action(\Spatie\Mailcoach\Http\Api\Controllers\Automations\TriggerAutomationController::class, [$this->automation]) }}</code></p>
    <p class="mt-4">Example POST request:</p>
    <pre class="max-w-full overflow-x-auto bg-blue-100 p-2">
<code class="">$ MAILCOACH_TOKEN="your API token"
$ curl -x POST {{ action(\Spatie\Mailcoach\Http\Api\Controllers\Automations\TriggerAutomationController::class, [$this->automation]) }} \
    -H "Authorization: Bearer $MAILCOACH_TOKEN" \
    -H 'Accept: application/json' \
    -H 'Content-Type: application/json'
    -d '{"subscribers":[1, 2, 3]}'
</code></pre>
    <p class="my-4">The automation will only trigger for subscribed subscribers of the automation's email list & segment.</p>
</div>
