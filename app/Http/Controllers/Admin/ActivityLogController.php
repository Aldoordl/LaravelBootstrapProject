<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ActivityLogController extends Controller
{
    public function downloadLog()
    {
        // Mendapatkan semua log aktivitas yang ada
        $activityLogs = ActivityLog::latest()->get();

        if ($activityLogs->isEmpty()) {
            return redirect()->route('admin.dashboard')->with('error', 'Error: Log is empty. There are no logs to download.');
        }
        
        // Menyimpan log ke dalam file teks
        $logContent = '';
        foreach ($activityLogs as $log) {
            $logContent .= "[{$log->created_at}] {$log->activity}: {$log->description}\n";
        }

        // Menyimpan log ke dalam file txt
        $logFileName = 'activity_log.txt';
        Storage::disk('local')->put($logFileName, $logContent);

        // Mendownload file log
        return response()->download(storage_path("app/{$logFileName}"));
    }

    public function logUserRegistered(User $user)
    {
        ActivityLog::create([
            'user_id' => $user->id,
            'activity' => 'user_registered',
            'description' => 'User ' . $user->name . ' registered.',
        ]);
    }

    public function logUserDeleted(User $user)
    {
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'user_deleted',
            'description' => 'User ' . $user->name . ' has been deleted by admin.',
        ]);
    }
}
