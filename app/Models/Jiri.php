<?php

namespace App\Models;

use App\Enums\ContactRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function students(): BelongsToMany
    {
        return $this->contacts()
            ->wherePivot('role', ContactRole::Student->value);
    }

    public function evaluators(): BelongsToMany
    {
        return $this->contacts()
            ->wherePivot('role', ContactRole::Evaluator->value);
    }

}
