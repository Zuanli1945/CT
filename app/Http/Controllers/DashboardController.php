<?php

namespace App\Http\Controllers;

use App\Models\Lahan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalLahan = Lahan::where('user_id', $userId)->count();
        $totalLuas  = Lahan::where('user_id', $userId)->sum('luas');
        $jumlahPadi = Lahan::where('user_id', $userId)->where('komoditas', 'padi')->count();
        $jumlahJagung = Lahan::where('user_id', $userId)->where('komoditas', 'jagung')->count();

        return view('dashboard', compact(
            'totalLahan',
            'totalLuas',
            'jumlahPadi',
            'jumlahJagung'
        ));
    }
}
