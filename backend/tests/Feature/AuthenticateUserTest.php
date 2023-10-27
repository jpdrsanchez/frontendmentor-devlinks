<?php

use App\Domain\User\Models\User;

it('should be able to authenticate a existing user', function () {
    $user = User::factory()->create();

    $response = $this->postJson('/api/v1/login', [
        'email' => $user->email,
        'password' => 'password',
    ]);

    $response->assertStatus(200);
    $response->assertJson([
        'user' => [
            'id' => $user->id,
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
        ],
    ]);
});

it('should be able to create an user', function () {
    $response = $this->postJson('/api/v1/signup', [
        'email' => 'email@example.com',
        'password' => 'Str0ngP@assw0rD',
        'confirm_password' => 'Str0ngP@assw0rD',
    ]);

    $user = User::where('email', 'email@example.com')->first();

    expect($user)->toBeInstanceOf(User::class);

    $response->assertStatus(201);
    $response->assertJson([
        'user' => [
            'id' => $user->id,
            'email' => $user->email,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
        ],
    ]);
});
