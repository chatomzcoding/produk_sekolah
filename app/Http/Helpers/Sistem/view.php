<?php
// fungsi untuk menampilkan notifikasi bahwa input wajib di isi 
if (! function_exists('ireq')) {
    function ireq()
    {
       $html = "<strong class='text-danger'>*</strong>";
       return $html;
    }
}

// fungsi untuk UI info teks
if (! function_exists('UIstatus')) {
    function UIstatus($status)
    {
        switch ($status) {
            case 'aktif':
                $html = "<span class='badge badge-success'>AKTIF</span>";
                break;
            case 'tidak aktif':
                $html = "<span class='badge badge-danger'>TIDAK AKTIF</span>";
                break;
            
            default:
                $html = NULL;
                break;
        }
       return $html;
    }
}
// fungsi untuk highlight menu aktif
if (! function_exists('classMenuAktif')) {
    function classMenuAktif($menu,$menuaktif)
    {
        $class = ($menu == $menuaktif) ? 'active' : NULL ;
        return $class;
    }
}
// fungsi untuk cek halaman menu ada atau tidak
if (! function_exists('cekView')) {
    function cekView($link)
    {
        $status = (file_exists($link)) ? TRUE : FALSE ;
        return $status;
    }
}

