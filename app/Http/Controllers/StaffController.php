<?php

namespace App\Http\Controllers;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::all();
        return view('staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_laundry' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:staff,email',
            'no_hp' => 'required',
            'level' => 'required|in:Admin,Pengunjung',
            'alamat' => 'required',
        ]);
        \Log::info($request->all());
        Staff::create([
            'nama' => $request->nama,
            'id_laundry' => $request->id_laundry,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'level' => $request->level,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('staff.index')->with('success', 'Staff berhasil ditambahkan');
    }

    public function edit(Staff $staff)
    {
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'nama' => 'required',
            'id_laundry' => 'required',
            'email' => 'required|email|unique:staff,email,'.$staff->id,
            'no_hp' => 'required',
            'level' => 'required|in:Admin,Pengunjung',
            'alamat' => 'required',
        ]);

        $data = $request->only(['nama', 'id_laundry', 'email', 'no_hp', 'level', 'alamat']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $staff->update($data);

        return redirect()->route('staff.index')->with('success', 'Staff berhasil diupdate');
    }

    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff berhasil dihapus');
    }
}
