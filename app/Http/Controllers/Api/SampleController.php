<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sample;

class SampleController extends Controller
{
    public function index()
    {
        return Sample::all();
    }

    public function show(Sample $sample)
    {
        return $sample;
    }
}