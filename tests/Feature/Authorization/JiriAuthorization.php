<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;

beforeEach(function () {
    $this->user1 = User::factory()
        ->hasJiris(1)
        ->create();
    $this->user2 = User::factory()
        ->hasJiris(1)
        ->create();
});

//test pour les jiris.
test('a user can only see his Jiri on the index page', function () {
    actingAs($this->user1);
    $jiri1 = $this->user1->jiris->first();
    $jiri2 = $this->user2->jiris->first();

    $response = get(route('jiris.index'));

    $response->assertStatus(200);

    $response->assertSee($jiri1->name);
    $response->assertDontSee($jiri2->name);
});

test('a user can\'t see another user\'s Jiri from a Jiri he owns', function () {
    actingAs($this->user1);
    $jiri1 = $this->user1->jiris->first();
    $jiri2 = $this->user2->jiris->first();

    $response = get(route('jiri.show'), $jiri2);

    $response->assertStatus(403);
});

test('a user can\'t modify another user\'s jiri', function () {
    actingAs($this->user2);
    $jiri1 = $this->user1->jiris->first();

    $response = patch(route('jiri.update'), $jiri1);
    $response->assertStatus(403);
});

test('a user cannot delete another user\'s jiri', function () {
    actingAs($this->user1);

    $other_jiri = $this->user2->jiris()->first();

    $response = delete(route('jiri.destroy'), $other_jiri);

    $response->assertStatus(403);
});
