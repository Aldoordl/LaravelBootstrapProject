<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function logUserRegistered(User $user)
    {
        ActivityLog::create([
            'user_id' => $user->id,
            'activity' => 'user_registered',
            'description' => 'User ' . $user->name . ' registered.',
        ]);
    }
}
