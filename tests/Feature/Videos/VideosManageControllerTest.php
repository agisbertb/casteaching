<?php

namespace Tests\Feature\Videos;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\Videos\VideosManageController

 */
class VideosManageControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */

    public function user_with_permissions_can_manage_videos(): void
    {
        $this->loginAsVideoManager();

        $videos = create_sample_videos();

        $response = $this->get('/manage/videos');
        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.index');
        $response->assertViewHas('videos',function($videos){
            return $videos->count() === count($videos) && get_class($videos) === Collection::class &&
                get_class($videos[0]) === Video::class;
        });

        foreach ($videos as $video) {
            $response->assertSee($video->id);
            $response->assertSee($video->title);
        }

    }

    /**
     * @test
     */

    public function regular_users_cannot_manage_videos()
    {
        $this->loginAsRegularUser();
        $response = $this->get('/manage/videos');
        $response->assertStatus(403);
    }

    /**
     * @test
     */

    public function guest_users_cannot_manage_videos()
    {
        $response = $this->get('/manage/videos');
        $response->assertRedirect(route('login'));
    }

    /**
     * @test
     */

    public function superadmins_can_manage_videos(): void
    {
        $this->loginAsSuperAdmin();

        $response = $this->get('/manage/videos');

        $response->assertStatus(200);
        $response->assertViewIs('videos.manage.index');
    }

    private function loginAsVideoManager()
    {
        Auth::login(create_video_manager_user());
    }

    private function loginAsSuperAdmin()
    {
        Auth::login(create_superadmin_user());
    }

    private function loginAsRegularUser()
    {
        Auth::login(create_regular_user());
    }
}
