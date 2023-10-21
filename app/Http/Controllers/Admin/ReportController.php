<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ReportController extends Controller
{
    public function reports(){
        $messages = Message::all(); // Ambil semua pesan

        return view('bootstrap.admin.report', compact('messages'));
    }

    public function delete($id)
    {
        $message = Message::find($id);

        if (!$message) {
            return redirect()->route('admin.reports')->with('error', 'Error: Message not found.');
        }

        // Catat aktivitas penghapusan pesan
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'message_delete',
            'description' => 'Admin ' . auth()->user()->name . ' deleted a message.',
        ]);

        $message->delete();

        return redirect()->route('admin.reports')->with('success', 'Success: Message deleted successfully.');
    }
}
