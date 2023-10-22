<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function index(){
        $activityLogs = ActivityLog::latest()->take(10)->get();

        return view('bootstrap.admin.dashboard', compact('activityLogs'));
    }

    public function profile(){
        // Mendapatkan daftar pengguna dari database
        $users = User::all();
        
        return view('bootstrap.admin.profile', compact('users'));
    }

    public function resume(){
        return redirect()->back()->with('error', '403 | Belum Jadi Bang 😁');
        // return view('bootstrap.admin.resume');
    }

    public function updateRole(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'email' => 'required|email',
            'role' => 'required|in:user,admin', // Pastikan rolenya hanya "user" atau "admin"
        ]);

        $email = $request->input('email');
        $role = $request->input('role');

        // Cari pengguna berdasarkan alamat email
        $user = User::where('email', $email)->first();

        if (!$user) {
            // Jika pengguna tidak ditemukan, beri pesan error
            return redirect()->route('admin.profile')->with('error', 'User not found.');
        }

        // Verifikasi apakah pengguna yang sedang login mencoba mengubah perannya sendiri menjadi "user"
        if (auth()->check() && auth()->user()->id === $user->id && $role == 'user') {
            // Jika pengguna mencoba mengubah dirinya sendiri menjadi "user", beri pesan error
            throw ValidationException::withMessages([
                'role' => 'Error: You cannot change your own role to User.',
            ]);
        }

        // Dapatkan informasi peran lama pengguna
        $oldRole = $user->role;

        // Ubah peran pengguna
        $user->role = $role;
        $user->save();

        // Catat log aktivitas perubahan peran pengguna
        ActivityLog::create([
            'user_id' => $user->id,
            'activity' => 'user_role_change',
            'description' => 'User ' . $user->name . ' role changed from ' . $oldRole . ' to ' . $role . ' by admin.',
        ]);

        // Tentukan pesan berdasarkan peran yang diubah
        if ($role == 'admin') {
            $message = 'Success: Role changed to Admin for ' . $user->email;
        } else {
            $message = 'Success: Role changed to User for ' . $user->email;
        }

        // Kirim pesan sukses ke view
        return redirect()->route('admin.profile')->with('success', $message);
    }

    public function deleteUser($id, ActivityLogController $activityLogController)
    {
        // Temukan akun berdasarkan ID
        $user = User::find($id);

        // Periksa apakah akun ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'Error: Account not found.');
        }

        // Periksa apakah akun yang sedang login adalah admin
        if (auth()->user()->id === $user->id && $user->isAdmin()) {
            return redirect()->back()->with('error', 'Error: You cannot delete your own admin account.');
        }

        // Hapus akun
        $user->delete();

        // Catat log aktivitas penghapusan akun pengguna
        $activityLogController->logUserDeleted($user);
        
        // Redirect kembali ke halaman dengan pesan sukses
        return redirect()->back()->with('success', 'Success: Account successfully deleted.');
    }
}
