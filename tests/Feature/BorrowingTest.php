<?php

use App\Models\User;

test('the borrowing index page can be displayed', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('borrowings.index'));

    $response->assertOk();
});
