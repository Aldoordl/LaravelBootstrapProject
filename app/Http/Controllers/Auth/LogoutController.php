<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        $user = Auth::user(); // Get user information before logout

        // Set status "offline" to false
        $user->status = false;
        $user->save();

        // Logout user
        Auth::logout();

        // Log the activity when the user logs out
        ActivityLog::create([
            'user_id' => $user->id,
            'activity' => 'user_logout',
            'description' => 'User ' . $user->name . ' has logged out.',
        ]);

        // Redirect to the login page or another appropriate page after logout
        return redirect('/');
    }
}
