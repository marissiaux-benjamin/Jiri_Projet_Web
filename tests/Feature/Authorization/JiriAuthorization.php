<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    $this->user1 = User::factory()
        ->hasJiris(1)
        ->hasProject(1)
        ->create();
    $this->user2 = User::factory()
        ->hasJiris(1)
        ->hasProject(1)
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
    $jiri1 = $this->user2->jiris->first();

    $response = get(route('jiri.show'), $jiri1);

    $response->assertStatus(403);
});

test('a user can\'t modify another user\'s jiri', function () {
    actingAs($this->user2);
    $jiri2 = $this->user1->jiris->first();

    $response = get(route('jiri.edit'), $jiri2);
    $response->assertStatus(403);
});


//test pour les projets.
test('a user can modify another user\'s project from a projects he owns', function () {
    actingAs($this->user1);
    $project1 = $this->user2->projects->first();
    $project2 = $this->user2->project->first();

    $response = get(route('projects.index'), $project1);

    $response->assertStatus(200);
    $response->assertSee($project1->name);
    $response->assertDontSee($project2->name);
});
