<?php

namespace App\Models;

use App\Enums\ContactRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jiri extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'starting_at',
    ];

    protected function casts()
    {
        return [
            'starting_at' => 'date:Y-m-d H:i',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function contacts(): BelongsToMany
    {
        return $this->belongsToMany(Contact::class, Attendance::class);
    }
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, Assignment::class);
    }

    public function students(): BelongsToMany
    {
        return $this
            ->contacts()
            ->withPivot('id')
            ->withPivotValue('role', ContactRoles::Student->value)
            ->withTimestamps();
    }

    public function evaluators(): BelongsToMany
    {
        return $this
            ->contacts()
            ->withPivot('id')
            ->withPivotValue('role', ContactRoles::Evaluator->value)
            ->withTimestamps();
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Contact::class,Attendance::class);
    }

    public function addStudent(Contact $contact)
    {
        $this->contacts()->attach($contact, ['role' => 'student']);
    }

    public function addEvaluator(Contact $contact)
    {
        $this->contacts()->attach($contact, ['role' => 'evaluator']);
    }

}
