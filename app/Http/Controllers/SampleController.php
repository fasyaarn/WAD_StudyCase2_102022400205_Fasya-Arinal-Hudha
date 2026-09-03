<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $samples = Sample::all();
        return view('samples.index', compact('samples'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('samples.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_sampel' => ['required', 'unique:samples', 'max:255'],
            'nama_sampel' => ['required', 'max:255'],
            'jenis_sampel' => ['required', 'in:Air Bersih,Air Limbah,Udara,Emisi Gas,Tanah'],
            'jumlah_titik' => ['required', 'integer', 'min:1'],
            'biaya_per_titik' => ['required', 'integer', 'min:0'],
            'status_uji' => ['required', 'in:Pending,In Analysis,Completed'],
            'catatan_kondisi' => ['nullable', 'string', 'max:255'],
        ]);
        Sample::create($validated);
        return redirect()->route('samples.index') ->with('success', 'Sample created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sample $sample)
    {
        return view('samples.show', compact('sample'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sample $sample)
    {
        return view('samples.edit', compact('sample'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sample $sample)
    {
        if ($request->user()->role === 'admin') {
            $validated = $request->validate([
                'kode_sampel' => ['required', Rule::unique('samples')->ignore($sample->id), 'max:255'],
                'nama_sampel' => ['required', 'max:255'],
                'jenis_sampel' => ['required', 'in:Air Bersih,Air Limbah,Udara,Emisi Gas,Tanah'],
                'jumlah_titik' => ['required', 'integer', 'min:1'],
                'biaya_per_titik' => ['required', 'integer', 'min:0'],
                'status_uji' => ['required', 'in:Pending,In Analysis,Completed'],
                'catatan_kondisi' => ['nullable', 'string', 'max:255'],
            ]);
        }else {
            $validated = $request->validate([
                'status_uji' => ['required', 'in:Pending,In Analysis,Completed'],
                'catatan_kondisi' => ['nullable', 'string', 'max:255'],
            ]);
        }
        $sample->update($validated);
        return redirect()->route('samples.index') ->with('success', 'Sample updated successfully');
       }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sample $sample)
    {
        $sample->delete();
        return redirect()->route('samples.index') ->with('success', 'Sample deleted successfully');
    }
}
