<?php

use App\Domain\User\Models\User;

it('should be able to authenticate a existing user', function () {
    $user = User::factory()->create();

    $response = $this->postJson('/api/v1/login', [
        'email' => $user->email,
        'password' => 'password',
        'confirm_password' => 'password',
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
