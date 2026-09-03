<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSamples = Sample::count();
        $totalTitikUji = Sample::sum('jumlah_titik');
        $totalBiaya = Sample::all()->sum(function ($sample) {
            return $sample->biaya_per_titik * $sample->jumlah_titik;
        });
        return view('dashboard', compact('totalSamples', 'totalTitikUji', 'totalBiaya'));
    }
}
