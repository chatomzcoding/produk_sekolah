<?php
if (! function_exists('kelas')) {
    function kelas($tingkatan)
    {
        switch ($tingkatan) {
            case 'SDLB':
                $result = ['I','II','III','IV','V','VI'];
                break;
            
            case 'SMPLB':
                $result = ['VII','VIII','IX'];
                break;
            
            case 'SMALB':
                $result = ['X','XI','XII'];
                break;
            
            default:
                # code...
                break;
        }
        return $result;
    }
}

if (! function_exists('kategorifasilitas')) {
    function kategorifasilitas()
    {
        $result = [
            'Fasilitas Umum',
            'Ruang Praktek',
            'Ruang Belajar'
        ];
        return $result;
    }
}
if (! function_exists('list_fase')) {
    function list_fase()
    {
        $result = ['A','B','C','D','E','F'];
        return $result;
    }
}

if (! function_exists('kekhususan')) {
    function kekhususan()
    {
        $result = [
            'Tunanetra (A)',
            'Tunarungu (B)',
            'Tunagrahita ringan (C)',
            'Tunagrahita sedang (C1)',
            'Tunadaksa ringan (D)',
            'Tunadaksa sedang (D1)',
            'Tunalaras (E)',
            'Tunawicara (F)',
            'Hyperaktif (H)',
            'Cerdas Istimewa (I)',
            'Bakat Istimewa (J)',
            'Kesulitan Belajar (K)',
            'Narkoba (N)',
            'Indigo (O)',
            'Down Syndrome (P)',
            'Autis (Q)',
        ];
        
        return $result;
    }
}

if (! function_exists('menu')) {
    function menu($menu)
    {
        $class = NULL;
        $link   = $_SERVER['REQUEST_URI'];
        if ($menu == $link) {
            $class  = 'active';
        }
        return $class;
    }
}

