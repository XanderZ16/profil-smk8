<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Mendapatkan tanggal hari ini
        $date = now()->format('Y-m-d');

        // Cek apakah visitor ID sudah ada dalam cookie
        $visitor_id = cookie('visitor_' . $date);

        if ($visitor_id) {
            return $next($request);
        } else {
            $visitor = Visitor::whereDate('date', $date)->first();

            if ($visitor) {
                // Jika visitor ditemukan, increment count-nya
                $visitor->increment('count');
            } else {
                // Jika visitor tidak ditemukan, buat entri baru
                $visitor = Visitor::create([
                    'date' => $date,
                    'count' => 1,
                ]);
            }

            // Hitung detik sampai tengah malam
            $midnight = now()->endOfDay(); // Mendapatkan waktu tengah malam
            $secondsUntilMidnight = $midnight->diffInSeconds(now());

            // Set cookie dengan waktu kadaluwarsa hingga tengah malam
            cookie()->queue('visitor_' . $date, $visitor->id, $secondsUntilMidnight);

            return $next($request);
        }
    }
}
