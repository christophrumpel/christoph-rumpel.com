<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageResponseTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function it_gives_successful_response_for_homepage(): void
    {
        $this->get('/')
            ->assertSuccessful();
    }

    /** @test * */
    public function it_gives_successful_response_for_products_page(): void
    {
        $this->get(route('page.products'))
            ->assertSuccessful();
    }

    /** @test * */
    public function it_gives_successful_response_for_privacy_policy_page(): void
    {
        $this->get('/privacy-policy')
            ->assertSuccessful();
    }

    /** @test * */
    public function it_gives_successful_response_for_privacy_policy_lca_page(): void
    {
        $this->get('/privacy-policy-lca')
            ->assertSuccessful();
    }

    /** @test * */
    public function it_gives_successful_response_for_privacy_policy_rp_page(): void
    {
        $this->get('/privacy-policy-rp')
            ->assertSuccessful();
    }

    /** @test * */
    public function it_gives_successful_response_for_uses_page(): void
    {
        $this->get('/uses')
            ->assertSuccessful();
    }

    /** @test * */
    public function it_gives_successful_response_for_bcwp_page(): void
    {
        $this->get('build-chatbots-with-php')
            ->assertSuccessful();
    }

    /** @test * */
    public function it_gives_successful_response_newsletter_page(): void
    {
        $this->get(route('page.newsletter'))
            ->assertSuccessful();
    }
}
