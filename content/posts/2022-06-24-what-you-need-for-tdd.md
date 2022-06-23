---
title: 3 Things You Need For Test Driven Development
categories: Test
summary: ""
hidden: false
preview_image: images/blog/2021/yearinreview_2021_me.png
preview_image_twitter: images/blog/2021/yearinreview_2021_me.png
---

<img class="blogimage" alt="Screenshot of Christoph Rumpel during a stream" src="/images/blog/2021/yearinreview_2021_me.png" />


many teach "how to test", phpunit, pest, the function etc. more important is something else.

## You Need To Know What To Test

When you start with testing, the biggest obstacle is what to test? Because when at the beginning, you have no idea. You read all the difficult terms like `unit tests`, `feature tests`, `integration tests`, and so on. Then you see difficult examples of all different types of test, and you are struggling even more.

That's why I always show a very simple test, that everybody understands immediately, but more important, can use right away.

```php
public function it_gives_successful_response_for_homepage()
    {
        $this->get('/')
            ->assertSuccessful();
    }
```

You maybe need to explain that this assertions checks if the response code of this request is between 200 and 300, but that's it. From that moment on, you know that your homepage is not throwing any errors. This is already a great start, and if you only have this one test, it still makes a different.

From now on, you can test all your pages of your application, which I do in every project. Similar to that you will learn what else you can test, like if a class call does the expected thing.

```php
    public function it_creates_new_post_file()
    {
        Storage::fake('posts');

        $postPath = PostFactory::new()
            ->create();

        $this->assertFileExists($postPath);
    }
```

I also write tests for all `commands` I create in my Laravel apps.

```php
public function it_caches_posts_when_command_run()
    {
        $this->assertFalse(Cache::has('posts'));

        $this->artisan(CachePostsCommand::class);

        $this->assertTrue(Cache::has('posts'));
     
    }
```

<div class="blognote"><strong>Note:</strong> All provided examples are real tests from this blog of mine.</div>

The more you learn about testing, the bigger your list of `things to test` will grow. Testing is about providing you more confidence when deploying your application or changing it. There is can vary on how many tests you will need to achieve that. This is you choice.

## You Need To Know Your Stack

In this case, with `stack`, I don't mean your low-level tools like local environment or coding language. I mean how you build your PHP applications. The tools that I mostly use are `Laravel` and `Laravel Livewire`. This  is important, because it helps you to think of your future implementations when using TDD.

With TDD you start with a test. But is hard to write a test, when you don't know how you will build something. That's why it is crucial to know your tools.

```php
public function it_includes_video_player_component () {
    // Arrange
    $user = User::factory()
        ->withPurchasedProduct();


    // Act & Assert
    $this->actingAs($user)
        ->get(route('videos', $user->products->first()))
        ->assertSeeLivewire(VideoPlayer::class);
});
```

In the test above, I make sure the site includes a video player. Of course, I could also check if the site includes the player's headline, the current video name, previous and next buttons, and so on. But since this is a Livewire component, I like to test the component on its own. That's in the test for the page, I only make sure the component is used.

These things I already know when I start a new project, and it helps a lot while writing tests before the implementation.

## You Need To Change Your Workflow

With TDD, you always write a test first. Of course, there are variations of this approach, but we focus on the pure one for today.

Writing a test before you know the implementation is big shift, and it will take a while before you get used to it.

The new workflow is called `Red Green Refactor` and describes the three important steps.

### `Red`

Stands for a failing test. This is also true for a fresh empty test, it will fail.

### Green
The next step is to make you test `Green`, which means making it pass. That's when you have to implement your new feature and the test will tell you it works as expected.

This is a crucial step, because there are many ways to make your test green. But we are only interested in the fastest one. We don't care if the code is beautiful or SOLID or whatever. We just want it to work, which is the most important thing.

### Refactor

Only after a test is passing, we can start thinking about how to make the code better. This could mean anything from code-styling, to making it more readable, or just more simple.

Because we already know that you first solution worked, we will immediately see if the new solution is failing. This will give you a lot of confidence for refactoring your code to your needs.

## Conclusion

Test Driven Development has become my default for coding for some years now. It helps me to better focus and concentrate on the goals while developing. It also lets me sleep better at night when knowing my code works.


