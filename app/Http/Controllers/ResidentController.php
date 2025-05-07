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
        $validated = $request->validate([
            'nik' => ['required|string|max:16|min:16'],
            'name' => ['required|string|max:100'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birth_date' => ['required', 'date'],
            'birth_place' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:700'],
            'religion' => ['nullable', 'string', 'max:50'],
            'marital_status' => ['required', Rule::in(['single', 'married', 'divorced', 'widowed'])],
            'occupation' => ['nullable', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:15'],
            'status' => ['required', Rule::in(['active', 'moved', 'deceased'])],
        ]);

        Resident::create($request->validated());
        return redirect()->route('residents.index')->with('success', 'Resident created successfully!');
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
            'nik' => ['required|string|max:16|min:16'],
            'name' => ['required|string|max:100'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'birth_date' => ['required', 'date'],
            'birth_place' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:700'],
            'religion' => ['nullable', 'string', 'max:50'],
            'marital_status' => ['required', Rule::in(['single', 'married', 'divorced', 'widowed'])],
            'occupation' => ['nullable', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:15'],
            'status' => ['required', Rule::in(['active', 'moved', 'deceased'])],
        ]);

        Resident::findOrFail($id)->update($request->validated());
        return redirect()->route('residents.index')->with('success', 'Resident updated successfully!');
    }

    public function destroy($id)
    {
        $resident = Resident::findOrFail($id);
        $resident->delete();

        return redirect()->route('residents.index')->with('success', 'Resident deleted successfully!');
    }
}
