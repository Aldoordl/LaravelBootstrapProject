<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class TablesController extends Controller
{
    public function resetTables(Request $request)
    {
        $tablesToReset = $request->input('tables');

        if (empty($tablesToReset)) {
            return redirect()->route('admin.dashboard')->with('error', 'Error: Please select at least one table to reset.');
        }

        $migrationPaths = [];
        $availableMigrations = [
            'activity_logs' => '2023_10_09_235839_create_activity_logs_table.php',
            'user_acc' => '2014_10_12_000000_create_users_table.php',
            // 'resume' => '2023_10_21_115008_create_messages_table.php',
            'project_upload' => '2023_10_09_142327_create_projects_table.php',
            'report_msg' => '2023_10_21_115008_create_messages_table.php',
        ];

        foreach ($tablesToReset as $table) {
            if (isset($availableMigrations[$table])) {
                $migrationPaths[] = 'database/migrations/' . $availableMigrations[$table];

                $projects = Project::all();
                // Hapus gambar terlebih dahulu
                foreach ($projects as $project) {
                    if ($project->image) {
                        Storage::disk('public')->delete($project->image);
                    }
                } 
            }
        }

        if (empty($migrationPaths)) {
            return redirect()->route('admin.dashboard')->with('error', 'Error: No valid tables selected for reset.');
        }

        // Reset tabel migrasi dengan multiple paths
        Artisan::call('migrate:refresh', ['--path' => $migrationPaths, '--force' => true]);

        // Catat aktivitas reset tabel
        foreach ($tablesToReset as $table) {
            ActivityLog::create([
                'user_id' => auth()->id(),
                'activity' => 'table_reset',
                'description' => 'Admin ' . auth()->user()->name . ' reset ' . $table . ' table.',
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Success: Selected tables have been reset.');
    }
}
