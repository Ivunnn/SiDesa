<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Resident;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::all();

        return view('pages.residents.index', [
            'residents' => $residents,
        ]);

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => ['required', 'string', 'max:16', 'min:16'],
            'name' => ['required', 'string', 'max:100'],
            'gender' => ['required', Rule::in(['Laki-Laki', 'Perempuan'])],
            'birth_date' => ['required', 'date'],
            'birth_place' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:700'],
            'religion' => ['nullable', 'string', 'max:50'],
            'marital_status' => ['required', Rule::in(['Belum Kawin', 'Sudah Kawin', 'Cerai', 'Janda/Duda'])],
            'occupation' => ['nullable', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:15'],
            'status' => ['required', Rule::in(['Aktif', 'Pindah', 'Meninggal'])],
        ]);

        Resident::create($validatedData);
        return redirect()->route('residents.index')->with('success', 'Data penduduk berhasil ditambahkan!');
    }

    public function show($id)
    {
        $resident = Resident::findOrFail($id);

        return view('pages.residents.show', [
            'resident' => $resident,
        ]);
    }
    public function create()
    {
        return view('pages.residents.create');
    }

    public function edit($id)
    {
        $resident = Resident::findOrFail($id);

        return view('pages.residents.edit', [
            'resident' => $resident,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nik' => ['required', 'string', 'max:16', 'min:16'],
            'name' => ['required', 'string', 'max:100'],
            'gender' => ['required', Rule::in(['Laki-Laki', 'Perempuan'])],
            'birth_date' => ['required', 'date'],
            'birth_place' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:700'],
            'religion' => ['nullable', 'string', 'max:50'],
            'marital_status' => ['required', Rule::in(['Belum Kawin', 'Sudah Kawin', 'Cerai', 'Janda/Duda'])],
            'occupation' => ['nullable', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:15'],
            'status' => ['required', Rule::in(['Aktif', 'Pindah', 'Meninggal'])],
        ]);

        Resident::findOrFail($id)->update($validated);

        return redirect()->route('residents.index')->with('success', 'Data penduduk berhasil diupdate!');
    }

    public function destroy($id)
    {
        $resident = Resident::findOrFail($id);
        $resident->delete();

        return redirect()->route('residents.index')->with('success', 'Resident deleted successfully!');
    }
}
