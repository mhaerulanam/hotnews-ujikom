<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = "Artikel";
        $data['artikel'] = DB::table('tb_artikel')->orderByDesc('id')->get();
        return view("BE\artikel.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = "Artikel";
        return view("BE\artikel.add", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $this->validate($request, [
                'judul' => 'required',
                'isi' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
            ]);

            $reqImage = $request->image;
            if ($request->hasFile('image')) {
                $name = time().rand(1,100).'.'.$reqImage->extension();
                $reqImage->move(public_path().'/upload/artikel/', $name);
                $imageurl = $name;
            }

            $dtArtikel = [
                'judul_artikel' => $request->judul,
                'image' => $imageurl,
                'isi_artikel' => $request->isi,
                'id_penulis' => 2,
                'tanggal' => now(),
            ];

            $save = DB::table('tb_artikel')->insert($dtArtikel);

            if ($save) {
                return redirect('/artikel')
                    ->with([
                        'success' => 'Data Berhasil Ditambah',
                    ]);
            } else {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with([
                        'error' => 'Data Gagal Ditambah!',
                    ]);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['title'] = "Artikel";
        $data['artikel'] = DB::table('tb_artikel')->orderByDesc('id')->first();
        return view("BE\artikel.show", $data);
    }

    public function detailArtikel(string $id)
    {
        $data['title'] = "Artikel";
        $data['artikel'] = DB::table('tb_artikel')->where("id", $id)->orderByDesc('id')->first();
        return view("FE.detail_artikel", $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = "Artikel";
        $data['artikel'] = DB::table('tb_artikel')->where("id", $id)->orderByDesc('id')->first();
        return view("BE\artikel.add", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $artikel = DB::table('tb_artikel')->where('id',$id)->first();
        $imageurl = $artikel->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time().rand(1,100).'.'.$reqImage->extension();
            $reqImage->move(public_path().'/upload/artikel/', $name);
            $imageurl = $name;

            $file = 'upload/artikel/' . $artikel->image;
            if ($artikel->image != '' && $artikel->image != null) {
                unlink($file);
            }
        }

        $changeArtikel = [
            'judul_artikel' => $request->judul,
            'image' => $imageurl,
            'isi_artikel' => $request->isi,
            'id_penulis' => 2,
            'tanggal' => now(),
        ];

        $data = DB::table('tb_artikel')
                    ->where('id', $id)
                    ->update($changeArtikel);

        // return $data;
        if ($artikel) {
            return redirect('/artikel')
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
        $artikel = DB::table('tb_artikel')->where('id',$id)->first();

        if (empty($artikel)) {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' => 'Data Artikel tidak ditemukan!',
            ]);
        }

        $file = 'upload/artikel/' . $artikel->image;
        if ($artikel->image != '' && $artikel->image != null) {
            unlink($file);
        }

        $data = DB::table('tb_artikel')->where('id',$id)->delete();

        if ($artikel) {
            return redirect('/artikel')
                ->with([
                    'success' => 'Data Berhasil Dihapus',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Dihapus!',
                ]);
        }
    }
}
