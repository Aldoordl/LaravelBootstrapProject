<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

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
            return redirect()->route('admin.reports')->with('error', 'Message not found.');
        }

        $message->delete();

        return redirect()->route('admin.reports')->with('success', 'Message deleted successfully.');
    }
}
