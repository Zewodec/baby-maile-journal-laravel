<?php

namespace Tests\Feature;

use App\Models\Child;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RozvytokDytynyControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_rozvytok_dytyny_page()
    {
        $user = User::factory()->create();
        $child = Child::factory()->create(['user_id' => $user->id]);
        $user->update(['selected_children_id' => $child->id]);

        $this->actingAs($user);

        $response = $this->get(route('rozvytok-dytyny.index'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.rozvytok-dytyny');
        $response->assertViewHas('user', $user);
        $response->assertViewHas('children_name', $child->name);
        $response->assertViewHas('children_age_string', $child->getBirthday());
    }
}
