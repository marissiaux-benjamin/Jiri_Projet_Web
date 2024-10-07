<?php

use App\Enums\ContactRoles;
use App\Models\Contact;
use App\Models\Jiri;
use App\Models\User;
use Couchbase\Role;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;

beforeEach(function () {
    $this->user1 = User::factory()
        ->has(
            Jiri::factory()
                ->count(1)
                ->hasAttached(
                    Contact::factory()
                        ->count(1)
                        ->state(function (array $attributes, Jiri $jiri) {
                            return ['user_id' => $jiri->user_id];
                        }),
                    fn() => [
                        'role' => random_int(0, 1) ?
                            ContactRoles::Evaluator->value :
                            ContactRoles::Student->value,
                    ]
                )
        )
        ->create();


    $this->user2 = User::factory()
        ->has(
            Jiri::factory()
                ->count(1)
                ->hasAttached(
                    Contact::factory()
                        ->count(1)
                        ->state(function (array $attributes, Jiri $jiri) {
                            return ['user_id' => $jiri->user_id];
                        }),
                    fn() => [
                        'role' => random_int(0, 1) ?
                            ContactRoles::Evaluator->value :
                            ContactRoles::Student->value,
                    ]
                )
        )
        ->create();

});

test('A user can\'t change a jiri participant to student or evaluator', function () {
    actingAs($this->user1);
    $attendance1 = $this->user2->attendances->first();

    $response = patch(route('attendance.update', $attendance1));

    $response->assertStatus(403);
});
