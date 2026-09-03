@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Dashboard</h1>
    <p>Total Sampel: {{ $totalSamples }}</p>
    <p>Total Titik Uji: {{ $totalTitikUji }}</p>
    <p>Total Biaya: Rp {{ number_format($totalBiaya, 0, ',', '.') }}</p>
@endsection