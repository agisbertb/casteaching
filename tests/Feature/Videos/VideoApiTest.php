<?php

namespace Tests\Feature\Videos;

use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\Videos\VideosApiController
 */

class VideoApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function guest_users_can_index_published_videos(): void
    {
        $videos = create_sample_videos();

        $response = $this->get('/api/videos');
        $response->assertStatus(200);

        $response->assertJsonCount(count($videos));
    }

    /**
     * @test
     */
    public function guest_users_can_show_published_videos(): void
    {
        $video = Video::create([
            'title' => 'Video api test',
            'description' => 'Video api test description',
            'url' => 'https://www.youtube.com/watch?v=12345',
        ]);

        $response = $this->getJson('/api/videos/' . $video->id);

        $response->assertStatus(200);

        $response->assertSee($video->title);
        $response->assertSee($video->description);
        $response->assertSee($video->id);

        $response->assertJson((fn (AssertableJson $json) => $json
            ->where('title', $video->title)
            ->where('description', $video->description)
            ->where('id', $video->id)->etc()));
    }

    /**
     * @test
     */
    public function guest_users_cannot_show_unexisting_videos(): void
    {
        $response = $this->get('/api/videos/999');

        $response->assertStatus(404);
    }
}
