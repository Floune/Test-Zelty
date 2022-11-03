<?php

namespace Tests\Unit;

use App\Http\Services\Filter;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class FilterTest extends TestCase
{
    use RefreshDatabase;

    public function test_no_filters() {
        $user = User::factory()->create();
        $results = (new Filter([], $user))->run();
        $this->assertEquals($results->count(), Post::where("user_id", $user->id)->count());
    }

    public function test_filters() {
        $user = User::factory()->create();

        $draft = (new Filter(["status" => "DRAFT"], $user))->run();
        $this->assertEquals($draft->count(), Post::where("user_id", $user->id)->where("status", "DRAFT")->count());

        $published = (new Filter(["status" => "PUBLISHED"], $user))->run();
        $this->assertEquals($published->count(), Post::where("user_id", $user->id)->where("status", "published")->count());

    }


}
