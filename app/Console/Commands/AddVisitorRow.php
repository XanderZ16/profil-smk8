<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Models\Visitor;
use Illuminate\Console\Command;

class AddVisitorRow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visitor:add-row';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add visitor row every day';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date = now()->format('Y-m-d'); // Mendapatkan tanggal hari ini
        $sessionKey = "visitor_{$date}"; // Kunci session sederhana

        // Cek apakah session untuk pengunjung hari ini sudah ada
        if (!session()->has($sessionKey)) {
            // Hitung waktu hingga pergantian hari
            $secondsUntilMidnight = now()->diffInSeconds(now()->endOfDay());

            // Tandai di session bahwa perangkat ini sudah dihitung
            session()->put($sessionKey, true);

            // Atur waktu kedaluwarsa session secara manual
            session()->save(); // Simpan sesi sebelum mengatur lifetime
            config(['session.lifetime' => ceil($secondsUntilMidnight / 60)]); // Lifetime dalam menit

            // Cek apakah sudah ada entri di tabel visitor
            $visitor = Visitor::whereDate('date', $date)->first();

            if (!$visitor) {
                // Buat entri baru jika belum ada
                Visitor::create([
                    'date' => $date,
                    'count' => 1,
                ]);
            } else {
                // Tambahkan count jika entri sudah ada
                $visitor->increment('count');
            }
        }
    }
}
