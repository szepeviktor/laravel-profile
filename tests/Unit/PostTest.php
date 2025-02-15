<?php

namespace Tests\Unit;

use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateComment()
    {
        factory(User::class)->states('me')->create();
        Mail::fake();
        $post = factory(Post::class)->create([
            'title' => 'My Article\'s Title',
            'body' => 'My Article\'s Body',
            'slug' => 'my-articles-title',
        ]);

        $post->createComment(['body' => 'Awesome article!']);

        $this->assertEquals(
            'Awesome article!',
            $post->fresh()->comments()->latest()->first()->body
        );
    }

    public function testScopeSlug()
    {
        $post = factory(Post::class)->create([
            'title' => 'My Article\'s Title',
            'body' => 'My Article\'s Body',
            'slug' => 'my-articles-title',
        ]);

        $exists = app(Post::class)->slug($post->slug)->exists();

        $this->assertNotNull($exists);
    }

    public function testGetShortBodyAttribute()
    {
        $post = factory(Post::class)->create([
            'title' => 'My Article\'s Title',
            'body' => '1111111111'
                . '1111111111'
                . '1111111111'
                . '1111111111'
                . '1111111111'
                . '1111111111'
                . '<span>1111111111</span>'
                . '1111111111'
                . '1111111111'
                . '1111111111'
                . '2222222222',
            'slug' => 'my-articles-title',
        ]);

        $this->assertEquals(
            '1111111111'
                . '1111111111'
                . '1111111111'
                . '1111111111'
                . '1111111111'
                . '1111111111'
                . '1111111111'
                . '1111111111'
                . '1111111111'
                . '1111111111',
            $post->short_body
        );
    }

    public function testGetShortPublishedAtAttribute()
    {
        $post = factory(Post::class)->create([
            'published_at' => '2017-02-02 06:06:06'
        ]);

        $this->assertEquals(
            'Feb 2, 2017',
            $post->short_published_at
        );
    }

    public function testTogglePublish()
    {
        $post = factory(Post::class)->create();

        $post->togglePublish();

        $this->assertNotNull($post->fresh()->published_at);
    }

    public function testScopePublished()
    {
        factory(Post::class, 2)->create();
        factory(Post::class)->states(['published'])->create();

        $this->assertEquals(
            1,
            app(Post::class)->published()->count()
        );
    }

    public function testPreviousPublished()
    {
        $previousPost = factory(Post::class)->create([
            'published_at' => Carbon::now()->subDay(),
        ]);
        $post = factory(Post::class)->create([
            'published_at' => Carbon::now(),
        ]);

        $previousPostFound = $post->previousPublished();

        $this->assertEquals($previousPost->title, $previousPostFound->title);
    }

    public function testNextPublished()
    {
        $post = factory(Post::class)->create([
            'published_at' => Carbon::now()->subDay(),
        ]);
        $nextPost = factory(Post::class)->create([
            'published_at' => Carbon::now(),
        ]);

        $nextPostFound = $post->nextPublished();

        $this->assertEquals($nextPost->title, $nextPostFound->title);
    }
}
