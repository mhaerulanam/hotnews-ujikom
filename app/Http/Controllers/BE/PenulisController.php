<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Penulis";
        $data['penulis'] = DB::table('users')
            ->where("role", 2)
            ->orderByDesc('id')
            ->get();

        // return $data;
        return view("BE\penulis.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Penulis";
        return view("BE\penulis.add", $data);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $dtUser = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2,
            'status' => $request->status,
        ];

        $save = DB::table('users')->insert($dtUser);

        if ($save) {
            return redirect('/login')
                ->with([
                    'success' => 'Pendaftaran Penulis Berhasil',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Pendaftaran Penulis Gagal!',
                ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $dtUser = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2,
            'status' => $request->status,
        ];

        $save = DB::table('users')->insert($dtUser);

        if ($save) {
            return redirect('/penulis')
                ->with([
                    'success' => 'Pendaftaran Penulis Berhasil',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Pendaftaran Penulis Gagal!',
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = "Penulis";
        $data['penulis'] = DB::table('users')
            ->where("role", 2)
            ->where("id", $id)
            ->orderByDesc('id')
            ->first();

        // return $data;
        return view("BE\penulis.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $changeArtikel = [
            'status' => $request->status,
        ];

        $data = DB::table('users')
                    ->where('id', $id)
                    ->update($changeArtikel);

        if ($data) {
            return redirect('/users')
                ->with([
                    'success' => 'Data Berhasil Diperbarui',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Diperbarui!',
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
