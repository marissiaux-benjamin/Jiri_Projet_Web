<?php

use App\Models\Jiri;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('routes the request to an index of jiris', function () {
    $response = get(route('jiris.index'));

    $response->assertStatus(200);
});


it('routes with model binding the request to a page that shows a specific jiri according to its id', function () {

    //les triple a que j ai mis ds les notes

    $jiri = Jiri::factory()->create(); //arrange

    $response = get(route('jiri.show', compact('jiri'))); //act

    $response->assertStatus(200); //assert
});

it('routes the request to a page that displays a form to create a jiri accessible only to an auth user', function () {
    actingAs($this->user->create());

    $response = get(route('jiri.create'));

    $response->assertStatus(200);
});

it('routes the request to a save in database action when providing jiri datas describing the jiri', function () {
    $jiri_data = [
        'name' => 'Projets web 2025',
        'starting_at' => now()->format("Y-m-d H:i"),
    ];


    $response = post(route('jiri.store'), $jiri_data);

    $jiri = Jiri::where('name', $jiri_data['name'])->first();

    $response->assertStatus(302);


    \Pest\Laravel\assertDatabaseHas('jiris', $jiri_data);
});
