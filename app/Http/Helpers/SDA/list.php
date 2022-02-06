<?php
// fungsi untuk menampilkan notifikasi bahwa input wajib di isi 
if (! function_exists('list_timlokus')) {
    function list_timlokus()
    {
        $data = [
            [
                'no' => 1,
                'id' => 1,
                'nip' => '197808232008011005',
                'nama' => 'HERIYANTO, A.Md.',
                'jabatan' => 'Pengawas Pengairan',
                'no_ppk' => '-',
                'tanggal' => '2021-01-01',
                'perihal' => '-',
            ],
            [
                'no' => 2,
                'id' => 2,
                'nip' => '197503132007011006',
                'nama' => 'Enan Supratna, SH',
                'jabatan' => 'Pengelola Data',
                'no_ppk' => '-',
                'tanggal' => '2021-02-04',
                'perihal' => '-',
            ],
            [
                'no' => 3,
                'id' => 3,
                'nip' => '196712071996031005',
                'nama' => 'Drs. H. ADANG MULYANA, MM.',
                'jabatan' => 'Pejabat Pembuat Komitmen',
                'no_ppk' => '900/Kep.29-BPKAD/2021',
                'tanggal' => '2021-08-12',
                'perihal' => 'PENUNJUKAN PENGGUNA ANGGARAN/ PENGGUNA BARANG DILINGKUNGAN PEMERINTAH KOTA TASIKMALAYA TAHUN ANGGARAN 2021',
            ]
        ];
        return $data;
    }
}
if (! function_exists('list_pekerjaan')) {
    function list_pekerjaan()
    {
        $data = [
            [
                'no' => 1,
                'id' => 1,
                'kode_pekerjaan' => '02.14',
                'kode_render' => '29606458',
                'nama_kegiatan' => 'Pengembangan dan Pengelolaan Sistem Irigasi Primer dan Sekunder pada Daerah Irigasi yang Luasnya dibawah 1000 Ha dalam 1 (Satu) Daerah Kabupaten/Kota',
                'sub_kegiatan' => 'Rehabilitasi Jaringan Irigasi Permukaan',
                'nama_paket' => 'Jasa Konsultansi Perencanaan Rehabilitasi Jaringan Irigasi di Kecamatan Indihiang kelurahan Indihiang',
                'provinsi' => 'jawa barat',
                'kabupaten' => 'kota tasikmalaya',
                'kecamatan' => 'bungursari',
                'kode_belanja' => '1.03.02.2.02.14',
                'sumber_dana' => 'Dana Alokasi Khusus',
                'tahun_anggaran' => '2021',
                'jenis_pekerjaan' => 'fisik',
                'konsultan_pengawas' => '-',
            ],
            [
                'no' => 2,
                'id' => 2,
                'kode_pekerjaan' => '01.10',
                'kode_render' => '9478440',
                'nama_kegiatan' => 'Pengelolaan SDA dan Bangunan Pengaman Pantai pada Wilayah Sungai (WS) dalam 1 (satu) Daerah Kabupaten/Kota',
                'sub_kegiatan' => 'Pembangunan Bangunan Perkuatan Tebing',
                'nama_paket' => 'Pembangunan Tembok Penahan Tanah ( TPT ) Jaringan Irigasi Bungursari Blok Jalan Mangin',
                'provinsi' => 'jawa barat',
                'kabupaten' => 'kota tasikmalaya',
                'kecamatan' => 'bungursari',
                'kode_belanja' => '1.03.02.2.01.10',
                'sumber_dana' => 'Bantuan Keuangan Provinsi',
                'tahun_anggaran' => '2021',
                'jenis_pekerjaan' => 'konsultan-pengawas',
                'konsultan_pengawas' => '-',
            ],
            [
                'no' => 3,
                'id' => 3,
                'kode_pekerjaan' => '19.07',
                'kode_render' => '6022440',
                'nama_kegiatan' => 'Perencanaan dan Kajian Sumber Daya Air Kota Tasikmalaya',
                'sub_kegiatan' => 'Perencanaan dan Kajian Sumber Daya Air Kota Tasikmalaya',
                'nama_paket' => 'Perencanaan Teknis SDA Wilayah Kecamatan Bungursari',
                'provinsi' => 'jawa barat',
                'kabupaten' => 'kota tasikmalaya',
                'kecamatan' => 'bungursari',
                'kode_belanja' => '1.03 . 1.03.01 .19.07.',
                'sumber_dana' => 'APBD Kota Tasikmalaya',
                'tahun_anggaran' => '2021',
                'jenis_pekerjaan' => 'konsultan-pengawas',
                'konsultan_pengawas' => '-',
            ],
        ];
        return $data;
    }
}

// fungsi untuk menampilkan notifikasi bahwa input wajib di isi 
if (! function_exists('list_perusahaan')) {
    function list_perusahaan()
    {
        $data = [
            [
                'no' => 1,
                'id' => 1,
                'nama_perusahaan' => 'CV. ABYAKTA KONSULTAN',
                'direktur' => 'Irpan Nugraha, ST',
                'alamat' => 'Perum Margabakti Duka Pratama Blok G 28 Cibeureum Kota Tasikmalaya',
                'bank' => 'BJB',
                'kantor_cabang' => 'Cabang Tasikmalaya',
                'no_rek' => '0099503173001',
                'npwp' => '92.072.939.9-425.000',
                'no_akta' => '13',
                'tanggal_akta' => '2019-02-07',
                'nama_notaris' => 'HERI HENDRIYANA, S.H., M.H.',
            ],
            [
                'no' => 2,
                'id' => 2,
                'nama_perusahaan' => 'CV. ARSEKAP KONSULTAN',
                'direktur' => 'Budi Mulyadi, S.E.',
                'alamat' => 'Dusun Kaliwon RT. 05 RW. 06 Desa Sagalaherang Kecamatan Panawangan Kabupaten Ciamis',
                'bank' => 'BJB',
                'kantor_cabang' => 'Ciamis',
                'no_rek' => '0072538451001',
                'npwp' => '66.246.321.5-442.000',
                'no_akta' => '37',
                'tanggal_akta' => '2018-10-08',
                'nama_notaris' => 'Risha Dwi Novianti, SH',
            ],
            [
                'no' => 3,
                'id' => 3,
                'nama_perusahaan' => 'CV. TRI KARYA',
                'direktur' => 'ASEP HUSNI FIKRI',
                'alamat' => 'KP. SUKAASIH RT. 010 RW. 001 DS. EUREUNPALAY KEC. CIBALONG',
                'bank' => 'BJB Syariah ',
                'kantor_cabang' => 'Cabang Tasikmalaya',
                'no_rek' => '0020101008257',
                'npwp' => '31.672.724.7-425.000',
                'no_akta' => '13',
                'tanggal_akta' => '2013-23-01',
                'nama_notaris' => 'Wawan Ridwan, SH., MKn.',
            ],
        ];
        return $data;
    }
}
// fungsi untuk menampilkan notifikasi bahwa input wajib di isi 
if (! function_exists('list_kontrakfisik')) {
    function list_kontrakfisik()
    {
        $data = [
            [
                'no' => 1,
                'id' => 1,
                '1' => '02.14 - Rehabilitasi Saluran Pembuang Cihideung Blok Gunung Huni',
                '2' => 'Rehabiltasi Jaringan Irigasi Permukaan',
                '3' => 'Rehabilitasi Saluran Pembuang Cihideung Blok Gunung Huni',
                '4' => '9249440',
                '5' => 'Kec. TAWANG, Kab/Kota.KOTA TASIKMALAYA',
                '6' => 'APBD Kota Tasikmalaya',
                '7' => '2021',
            ],
            [
                'no' => 2,
                'id' => 2,
                '1' => '19.02 - Pembangunan Saluran Irigasi Lombang',
                '2' => 'Pembangunan/Rehabilitasi Jaringan Irigasi Kota Tasikmalaya',
                '3' => 'Pembangunan Saluran Irigasi Lombang',
                '4' => '7527440',
                '5' => 'Kec. BUNGURSARI, Kab/Kota.KOTA TASIKMALAYA',
                '6' => 'Dana Alokasi Khusus',
                '7' => '2021',
            ],
            [
                'no' => 3,
                'id' => 3,
                '1' => '02.14 - Rehabilitasi Jaringan Irigasi Situ Cibeureum',
                '2' => 'Rehabilitasi Jaringan Irigasi Permukaan',
                '3' => 'Rehabilitasi Jaringan Irigasi Situ Cibeureum',
                '4' => '9365440',
                '5' => 'Kec. TAMANSARI, Kab/Kota.KOTA TASIKMALAYA',
                '6' => 'Dana Alokasi Khusus',
                '7' => '2021',
            ],
        ];
        return $data;
    }
}

if (! function_exists('list_leveluser')) {
    function list_leveluser()
    {
        $level  = ['admin','konsultan'];

        return $level;
    }
}