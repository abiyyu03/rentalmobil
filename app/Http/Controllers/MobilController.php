<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Mobil, Merk, TipeMobil};

class MobilController extends Controller
{
    // protected $arrayMobil = [
    //     [
    //         'namaMobil' => 'Hijet',
    //         'merkMobil' => 'Daihatsu',
    //         'cc' => '1000cc',
    //     ],
    // ];

    function index()
    {
        // //dataMobil : ketika session() tidak kosong maka mereturn sebelah kiri
        // // jika kosong maka mereturn sebelah kanan
        // $dataMobil = session()->get('dataMobilBaru') ?? $this->arrayMobil;
        // return view('mobil.index', compact('dataMobil'));
        $mobilData = Mobil::all();
        return view('pages.mobil.index', ['mobilData' => $mobilData]);
    }

    function create()
    {
        $merkData = Merk::get();
        $tipeMobilData = TipeMobil::get();
        return view('pages.mobil.create', compact('merkData', 'tipeMobilData'));
    }

    function store(Request $request)
    {
        //untuk melakukan validasi data, memastikan data tidak ada yang kosong
        $mobilData = $request->validate([
            'nama_mobil' => 'required',
            'merk_id' => 'required',
            'cc' => 'required',
            'tahun_mobil' => 'required',
            'nomor_polisi' => 'required',
            'warna' => 'required',
            'foto' => 'required',
            'tipe_mobil_id' => 'required'
        ]);
        // dd($mobilData);
        //untuk menyimpan data
        Mobil::create($mobilData);

        return redirect()->to('/mobil')->with('succes', 'Data mobil berhasil disimpan');

        // $namaMobil = $request->nama_mobil;
        // $merkMobil = $request->merk_mobil;
        // $cc = $request->cc;

        // $dataMobilBaru = [
        //     'namaMobil' => $namaMobil,
        //     'merkMobil' => $merkMobil,
        //     'cc' => $cc,
        // ];

        // array_push($this->arrayMobil, $dataMobilBaru);
        // return redirect()->to('/mobil')->with('dataMobilBaru', $this->arrayMobil);
    }
}
