<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'jiris_id',
        'contacts_id',
        'role'
    ];

    public function jiri()
    {
        return $this->belongsTo(Jiri::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
