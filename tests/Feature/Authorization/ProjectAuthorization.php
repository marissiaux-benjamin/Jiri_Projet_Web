<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

beforeEach(function () {
    $this->user1 = User::factory()
        ->hasProjects(1)
        ->create();
    $this->user2 = User::factory()
        ->hasProjects(1)
        ->create();

    actingAs($this->user1);
});

//test pour les projets.
test('a user cannot see the project of another user', function () {

    //on cré 2 projets et on prend le premier pour chaque user
    $project2 = $this->user2->projects->first();

    //ici on verifie si le user1 peut voir le projet du user2.
    $response = get(route('project.show', $project2));

    // ici c'est la réponse qu'on veut si le iser essaie de voir le projet du user2.
    $response->assertStatus(403);
});

test('a user cannot modify a project of another user', function () {
    $project2 = $this->user2->projects->first();

    $response = get(route('project.edit', $project2));

    $response->assertStatus(403);
});

test('a user can\'t edit another user\'s project', function () {

    $project2 = $this->user2->projects->first();

    $response = get(route('project.edit', $project2));

    $response->assertStatus(403);

});

test('a user cannot update another user\'s project', function () {
    $project2 = $this->user2->projects->first();

    $response = get(route('project.update', $project2));

    $response->assertStatus(403);
});

test('a user cannot delete a project of another user', function () {
    $project2 = $this->user2->projects->first();

    $response = delete(route('project.destroy', $project2));

    $response->assertStatus(403);
});
