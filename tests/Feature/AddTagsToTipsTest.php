<?php

namespace Tests\Feature;

use App\Tip;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddTagsToTipsTest extends TestCase
{
    use RefreshDatabase;

    public function testCanAddTagsToATip()
    {
        // Arrange
        $tip = factory(Tip::class)->states('published')->create();

        // Act
        $tip->addTags(['php', 'laravel', 'collection', 'eloquent', 'learning']);

        // Assert
        $this->assertEquals(5, $tip->fresh()->tags()->count());
    }
}
