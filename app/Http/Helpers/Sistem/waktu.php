<?php

## mengambil tanggal hari ini
if (! function_exists('tgl_sekarang')) {
    function tgl_sekarang() {
        return date('Y-m-d');
    }
}

## ambil tanggal hari ini
if (! function_exists('ambil_tgl')) {
    function ambil_tgl() {
        return date('d');
    }
}

## ambil bulan hari ini
if (! function_exists('ambil_bulan')) {
    function ambil_bulan() {
        return date('m');
    }
}

## ambil tahun hari ini
if (! function_exists('ambil_tahun')) {
    function ambil_tahun() {
        return date('Y');
    }
}

## mengambil Waktu hari ini
if (! function_exists('jam_sekarang')) {
    function jam_sekarang() {
        return date('H:i:s');
    }
}

// cek day remaining
if (! function_exists('dayremaining')) {
    function dayremaining($date)
    {
        $tgl 				= new Datetime();
        $now 				= new Datetime($date);
        $ultah = $tgl->diff($now);
        $result = 'finished';
        if ($tgl < $date) {
            if ($ultah->d == 0) {
                $result = 'today';
            }elseif ($ultah->d == 1) {
                $result = 'tomorrow';
            } else {
                $result =  $ultah->d . 'more days';
            }
        }
        return $result;
    }
}

// date indo
if (! function_exists('bulan_indo')) {
    function bulan_indo($m=null)
    {
        if (is_null($m)) {
            $m = ambil_bulan();
        } else {
            if (strlen($m) == 1)
                $m = '0'.$m;
        }
        
        $bulan 		= [	'01' => 'Januari',
                        '02' => 'Februari',
                        '03' => 'Maret',
                        '04' => 'April',
                        '05' => 'Mei',
                        '06' => 'Juni',
                        '07' => 'Juli',
                        '08' => 'Agustus',
                        '09' => 'September',
                        '10' => 'Oktober',
                        '11' => 'November',
                        '12' => 'Desember'];
        
        return $bulan[$m];
    }
}

// change date to indonesia date
if (! function_exists('date_indo')) {
    function date_indo($date=null,$info=null)
    {
        if (!is_null($date) AND $date <> '0000-00-00') {
            $tgl			= substr($date, 8,2);
            $bulan			= substr($date, 5,2);
            $tahun			= substr($date, 0,4);
            return $tgl.' '.bulan_indo($bulan).' '.$tahun;
        } else {
            $notif = 'Date Not Found';
            if (!is_null($info)) {
                $notif = $info;
            }
            return $notif;
        }
    }
}
// date indo
if (! function_exists('daftar_hari')) {
    function daftar_hari($data)
    {
        $hari 		= [	
            'Sunday'    => 'Minggu',
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu'
        ];
        return $hari[$data];
    }
}
// get nama hari
if (! function_exists('hari_indo')) {
    function hari_indo($tanggal)
    {
        $namahari = date('l', strtotime($tanggal));
        return daftar_hari($namahari);
    }
}

// tanggal hari ini
if (! function_exists('tanggal_hariini')) {
    function tanggal_hariini()
    {
        $date = tgl_sekarang();
            $tgl			= substr($date, 8,2);
            $bulan			= substr($date, 5,2);
            $tahun			= substr($date, 0,4);
            return $tgl.' '.bulan_indo($bulan).' '.$tahun;
    }
}

// ambil hanya jam dari database
if (! function_exists('db_datetime')) {
    function db_datetime($datetime,$filter=null)
    {
        $result = null;
        if (!is_null($filter) AND strlen($datetime) == 19) {
            switch ($filter) {
                case 'jam':
                    $result = substr($datetime, 11,8);
                    break;
                case 'tgl':
                    $result = substr($datetime, 0,10);
                    break;
            }
        } 
        return $result;
    }
}