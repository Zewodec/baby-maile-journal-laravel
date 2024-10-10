<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_auth_page_if_not_authenticated()
    {
        $response = $this->get(route('auth.page'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.auth');
    }

    /** @test */
    public function it_redirects_authenticated_user_from_auth_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('auth.page'));

        $response->assertRedirect(route('family.index'));
    }

    /** @test */
    public function it_registers_a_new_user()
    {
        $data = [
            'username'        => 'testuser',
            'email'           => 'test@example.com',
            'password'        => 'password',
            'password-repeat' => 'password',
        ];

        $response = $this->post(route('auth.register'), $data);

        $response->assertRedirect(route('family.index'));
        $this->assertDatabaseHas('users', ['email' => 'test@example.com']);
        $this->assertAuthenticated();
    }

    /** @test */
    public function it_prevents_registration_with_existing_email()
    {
        $user = User::factory()->create(['email' => 'existing@example.com']);

        $data = [
            'username'        => 'newuser',
            'email'           => 'existing@example.com',
            'password'        => 'password',
            'password-repeat' => 'password',
        ];

        $response = $this->post(route('auth.register'), $data);

        $response->assertStatus(400);
        $response->assertJson([
            'success' => false,
            'data'    => 'User with email already exists',
        ]);
    }

    /** @test */
    public function it_logs_in_an_existing_user()
    {
        $user = User::factory()->create(['password' => Hash::make('password')]);

        $data = [
            'email'    => $user->email,
            'password' => 'password',
        ];

        $response = $this->post(route('auth.login'), $data);

        $response->assertRedirect(route('family.index'));
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function it_prevents_login_with_invalid_credentials()
    {
        $user = User::factory()->create();

        $data = [
            'email'    => $user->email,
            'password' => 'wrongpassword',
        ];

        $response = $this->post(route('auth.login'), $data);

        $response->assertStatus(400);
        $response->assertJson([
            'success' => false,
            'data'    => 'The provided credentials do not match our records.',
        ]);
    }

    /** @test */
    public function it_changes_password_for_authenticated_user()
    {
        $user = User::factory()
            ->create(['password' => Hash::make('oldpassword')]);
        $this->actingAs($user);

        $data = [
            'old_password'     => 'oldpassword',
            'new_password'     => 'newpassword',
            'confirm_password' => 'newpassword',
        ];

        $response = $this->post(route('auth.change-password'), $data);

        $response->assertRedirect(route('family.index'));
        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
    }

    /** @test */
    public function it_prevents_password_change_with_incorrect_old_password()
    {
        $user = User::factory()
            ->create(['password' => Hash::make('oldpassword')]);
        $this->actingAs($user);

        $data = [
            'old_password'     => 'wrongoldpassword',
            'new_password'     => 'newpassword',
            'confirm_password' => 'newpassword',
        ];

        $response = $this->post(route('auth.change-password'), $data);

        $response->assertStatus(400);
        $response->assertJson([
            'success' => false,
            'data'    => 'The provided old password is incorrect.',
        ]);
    }

    /** @test */
    public function it_prevents_password_change_when_new_passwords_do_not_match(
    )
    {
        $user = User::factory()
            ->create(['password' => Hash::make('oldpassword')]);
        $this->actingAs($user);

        $data = [
            'old_password'     => 'oldpassword',
            'new_password'     => 'newpassword',
            'confirm_password' => 'differentpassword',
        ];

        $response = $this->post(route('auth.change-password'), $data);

        $response->assertStatus(400);
        $response->assertJson([
            'success' => false,
            'data'    => 'Password not the same.',
        ]);
    }
}
