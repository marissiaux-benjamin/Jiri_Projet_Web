<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function destroy(Assignment $assignment){

        $assignment->delete();
        return to_route('jiri.show', $assignment->jiri_id);
    }
}
