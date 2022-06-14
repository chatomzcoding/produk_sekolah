<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ppdb   = Ppdb::count();
        $ppdb   = $ppdb + 1;
        $no_pendaftaran = ambil_tahun().ambil_bulan().ambil_tgl().'-'.$ppdb;
        $pesertadidik = [
            'tanggal' => tgl_sekarang(),
            'nama' => $request->nama,
            'jk' => $request->jk,
            'nisn' => $request->nisn,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_akta' => $request->no_akta,
            'agama' => $request->agama,
            'warga_negara' => $request->warga_negara,
            'khusus' => $request->khusus,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'dusun' => $request->dusun,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kode_pos' => $request->kode_pos,
            'lintang' => $request->lintang,
            'bujur' => $request->bujur,
            'tinggal' => $request->tinggal,
            'transportasi' => $request->transportasi,
            'anak_ke' => $request->anak_ke,
            'pekerjaan' => $request->pekerjaan,
            'kip' => $request->kip,
            'status_kip' => $request->status_kip,
            'pip' => $request->pip,
            'no_telepon' => $request->no_telepon,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ];

        $orangtua = [
            'ayah' => [
                'nama' => $request->nama_ayah,
                'nik' => $request->nik_ayah,
                'tahun_lahir' => $request->tahun_lahir_ayah,
                'pendidikan' => $request->pendidikan_ayah,
                'pekerjaan' => $request->pekerjaan_ayah,
                'penghasilan' => $request->penghasilan_ayah,
                'khsusus' => $request->khsusus_ayah,
            ],
            'ibu' => [
                'nama' => $request->nama_ibu,
                'nik' => $request->nik_ibu,
                'tahun_lahir' => $request->tahun_lahir_ibu,
                'pendidikan' => $request->pendidikan_ibu,
                'pekerjaan' => $request->pekerjaan_ibu,
                'penghasilan' => $request->penghasilan_ibu,
                'khsusus' => $request->khsusus_ibu,
            ],
            'wali' => [
                'nama' => $request->nama_wali_wali,
                'nik' => $request->nik_wali,
                'tahun_lahir' => $request->tahun_lahir_wali,
                'pendidikan' => $request->pendidikan_wali,
                'pekerjaan' => $request->pekerjaan_wali,
                'penghasilan' => $request->penghasilan_wali,
            ]
        ];

        $priodik = [
            'tb' => $request->tb,
            'bb' => $request->bb,
            'lk' => $request->lk,
            'jarak' => $request->jarak,
            'nilai_jarak' => $request->nilai_jarak,
            'waktu' => [
                'jam' => $request->jam,
                'menit' => $request->menit,
            ],
        ];

        $prestasi = [];
        if (!is_null($request->jenis_prestasi)) {
            for ($i=0; $i < count($request->jenis_prestasi); $i++) { 
                $prestasi[] = [
                    'jenis' => $request->jenis_prestasi[$i],
                    'tingkat' => $request->tingkat[$i],
                    'nama' => $request->nama[$i],
                    'tahun' => $request->tahun[$i],
                    'penyelenggaran' => $request->penyelenggaran[$i],
                ];
            }
        }

        $beasiswa = [];
        if (!is_null($request->jenis_beasiswa)) {
            for ($i=0; $i < count($request->jenis_beasiswa); $i++) { 
                $beasiswa[] = [
                    'jenis' => $request->jenis_beasiswa[$i],
                    'keterangan' => $request->keterangan[$i],
                    'tahun_mulai' => $request->tahun_mulai[$i],
                    'tahun_selesai' => $request->tahun_selesai[$i],
                ];
            }
        }

        $kesejahteraan = [
            'jenis' => $request->jenis_kesejahteraan,
            'no_kartu' => $request->no_kartu,
            'nama_dikartu' => $request->nama_dikartu,
        ];
        Ppdb::create([
            'no_pendaftaran' => $no_pendaftaran,
            'pesertadidik' => $pesertadidik,
            'orangtua' => $orangtua,
            'priodik' => $priodik,
            'prestasi' => $prestasi,
            'beasiswa' => $beasiswa,
            'kesejahteraan' => $kesejahteraan,
        ]);

        return redirect('homepage/ppdb?s=selesai&no='.$no_pendaftaran);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function show(Ppdb $ppdb)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function edit(Ppdb $ppdb)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ppdb $ppdb)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ppdb  $ppdb
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ppdb $ppdb)
    {
        //
    }
}
