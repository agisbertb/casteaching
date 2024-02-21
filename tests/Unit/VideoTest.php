<?php

namespace Tests\Unit;

use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VideoTest extends TestCase
{
    use RefreshDatabase;

    /**
     @test
     */
    public function can_get_formatted_published_at_date(): void
    {
        // TODO CODE SMELL
        $video = Video::create([
            'title' => 'Ubuntu 101',
            'description' => '# Here description',
            'url' => 'https://youtu.be/w8j07_DBl_I',
            'published_at' => Carbon::parse('January 11, 2024 15:00'),
            'previous' => null,
            'next' => null,
            'series_id' => 1
        ]);

        $dateToTest = $video->formatted_published_at;

        $this->assertEquals($dateToTest, '11 de gener de 2024');

    }
    public function can_get_formatted_published_at_date_when_not_published(): void
    {
        // TODO CODE SMELL
        $video = Video::create([
            'title' => 'Ubuntu 101',
            'description' => '# Here description',
            'url' => 'https://youtu.be/w8j07_DBl_I',
            'published_at' => null,
            'previous' => null,
            'next' => null,
            'series_id' => 1
        ]);

        $dateToTest = $video->formatted_published_at;

        $this->assertEquals($dateToTest, '');

    }
}
