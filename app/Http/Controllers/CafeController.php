<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class CafeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cafe = Cafe::all()->sortBy('id');
        return view('layouts.cafe', ['cafe' => $cafe]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.createcafe');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'suasana' => 'required',
            'kenyamanan' => 'required',
            'kualitas' => 'required',
            'harga' => 'required',
            'wifi' => 'required',
            'pelayanan' => 'required',
            'kebersihan' => 'required',
            'lokasi' => 'required',
            'menu_unik' => 'required',
            'respon_pelanggan' => 'required',
        ]);

        $cafe = new Cafe;
        $cafe->nama = $request->get('nama');
        $cafe->alamat = $request->get('alamat');
        $cafe->suasana = $request->get('suasana');
        $cafe->kenyamanan = $request->get('kenyamanan');
        $cafe->kualitas = $request->get('kualitas');
        $cafe->harga = $request->get('harga');
        $cafe->wifi = $request->get('wifi');
        $cafe->pelayanan = $request->get('pelayanan');
        $cafe->kebersihan = $request->get('kebersihan');
        $cafe->lokasi = $request->get('lokasi');
        $cafe->menu_unik = $request->get('menu_unik');
        $cafe->respon_pelanggan = $request->get('respon_pelanggan');
        $cafe->save();

        Session::flash('success', 'Data Cafe Berhasil Ditambahkan');
        return redirect()->route('cafe.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cafe = Cafe::where('id', $id)->first();
        return view('layouts.detailcafe', compact('cafe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cafe = Cafe::find($id);
        return view('layouts.editcafe', compact('cafe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'suasana' => 'required',
            'kenyamanan' => 'required',
            'kualitas' => 'required',
            'harga' => 'required',
            'wifi' => 'required',
            'pelayanan' => 'required',
            'kebersihan' => 'required',
            'lokasi' => 'required',
            'menu_unik' => 'required',
            'respon_pelanggan' => 'required',
        ]);

        Cafe::where('id', $id)
            ->update([
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'suasana'=>$request->suasana,
                'kenyamanan'=>$request->kenyamanan,
                'kualitas'=>$request->kualitas,
                'harga'=>$request->harga,
                'wifi'=>$request->wifi,
                'pelayanan'=>$request->pelayanan,
                'kebersihan'=>$request->kebersihan,
                'lokasi'=>$request->lokasi,
                'menu_unik'=>$request->menu_unik,
                'respon_pelanggan'=>$request->respon,
            ]);

        Session::flash('success', 'Data Cafe Berhasil Diperbarui');
        return redirect()->route('cafe.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cafe::where('id', $id)->delete();

        Session::flash('success', 'Data Cafe Berhasil Dihapus');
        return redirect()->route('cafe.index');
    }

    public function importData(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $filePath = $file->getRealPath();

        $handle = fopen($filePath, "r");
        $header = fgetcsv($handle); // Baca baris header

        $importedCafes = [];

        while (($data = fgetcsv($handle)) !== false) {
            $cafe = new Cafe;
            $cafe->nama = $data[0];
            $cafe->alamat = $data[1];
            $cafe->suasana = $data[2];
            $cafe->kenyamanan = $data[3];
            $cafe->kualitas = $data[4];
            $cafe->harga = $data[5];
            $cafe->wifi = $data[6];
            $cafe->pelayanan = $data[7];
            $cafe->kebersihan = $data[8];
            $cafe->lokasi = $data[9];
            $cafe->menu_unik = $data[10];
            $cafe->respon_pelanggan = $data[11];
            $cafe->save();

            $importedCafes[] = $cafe;
        }

        fclose($handle);

        Session::flash('success', 'Import data CSV berhasil.');
        return redirect()->route('cafe.index')
            ->with('importedCafes', $importedCafes);
    }
}