<?php

namespace App\Http\Controllers;

use App\Http\Requests\BootstrapRequest;
use App\Models\ActivityLog;
use App\Models\Message;
use App\Models\Project;

class BootstrapController extends Controller
{
    public function index(){
        return view('bootstrap.page.dashboard');
    }

    public function contact(){
        return view('bootstrap.page.contact');
    }

    public function resume(){
        return view('bootstrap.page.resume');
    }

    public function showDownloadPage()
    {
        return view('bootstrap.auth.resume');
    }

    public function downloadResume()
    {
        // Simpan lokasi file resume
        $resumeFilePath = public_path('assets/project1.png');

        // Pastikan file resume tersedia
        if (file_exists($resumeFilePath)) {
            // Set nama file unduhan
            $downloadFileName = 'project1.png';

            // Mengatur header untuk tipe konten
            header('Content-Type: application/pdf');
            
            // Mengatur header untuk menyertakan file yang akan diunduh
            header('Content-Disposition: attachment; filename="' . $downloadFileName . '"');

            // Catat log aktivitas unduhan resume
            ActivityLog::create([
                'user_id' => auth()->user()->id,
                'activity' => 'resume_download',
                'description' => 'User ' . auth()->user()->name . ' downloaded their resume.',
            ]);

            // Mengirimkan file ke browser untuk diunduh
            readfile($resumeFilePath);
        } else {
            // Jika file tidak ditemukan, arahkan kembali ke halaman resume
            return redirect()->route('resume');
        }
    }

    public function project(){
        $projects = Project::all();
        
        return view('bootstrap.page.project', compact('projects'));
    }

    public function about(){
        return view('bootstrap.page.about');
    }

    public function submitForm(BootstrapRequest $request)
    {
        // Ambil data yang diinputkan oleh pengguna dari permintaan
        $nama = $request->input('name');
        $email = $request->input('email');
        $pesan = $request->input('message');

        // Simpan pesan ke dalam basis data
        Message::create([
            'nama' => $nama,
            'email' => $email,
            'pesan' => $pesan,
        ]);

        // Catat aktivitas pengiriman pesan
        ActivityLog::create([
            'user_id' => auth()->id(),
            'activity' => 'message_sent',
            'description' => 'User ' . auth()->user()->name . ' sent a message.',
        ]);

        // Pesan sukses
        $successMessage = "Form submitted successfully!";

        // Redirect dengan pesan sukses
        return redirect()->route('contact.message')->with([
            'nama' => $nama,
            'email' => $email,
            'pesan' => $pesan,
            'success' => $successMessage,
        ]);
    }

    public function showMessage()
    {
        // Cek apakah sesi berisi data pesan
        if (session('nama') || session('email') || session('pesan')) {
            return view('bootstrap.page.submit'); // Tampilkan pesan
        }

        // Jika tidak, arahkan kembali ke formulir
        return redirect()->route('contact');
    }
}
