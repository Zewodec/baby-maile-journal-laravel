<?php

namespace Tests\Unit;

use App\Models\Child;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TrackersControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_trackers_page()
    {
        $user = User::factory()->create();
        $child = Child::factory()->create(['user_id' => $user->id]);
        $user->update(['selected_children_id' => null]);

        $this->actingAs($user);

        $response = $this->get(route('trackers.index'));

        $user->refresh();
        $children_age_string = $child->getBirthday();

        $response->assertStatus(200);
        $response->assertViewIs('trackers');
        $response->assertViewHas('children_name', $child->name);
        $response->assertViewHas('children_age_string', $children_age_string);

        // Ensure selected_children_id was updated
        $this->assertEquals($child->id, $user->selected_children_id);
    }
}
