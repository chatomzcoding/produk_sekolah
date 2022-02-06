<?php
namespace App\Http\Helpers\Custom;

use Illuminate\Support\Facades\DB;

class DbSistem {

    public static function countGroupId($id) {
        $jumlah = DB::table('members')->where('group_id', $id)->count();
        return $jumlah;
    }

    public static function showtableid($table,$id)
    {
        $data = DB::table($table)->where('id',$id)->first();
        return $data;
    }

    // total data tabel
    public static function countData($table=null,$where=null)
    {
        $total = null;
        if (!is_null($table)) {
            if (!is_null($where) AND is_array($where)) {
                if (count($where) == 2) {
                    $total = DB::table($table)
                    ->where($where[0],$where[1])
                    ->count();
                }
            } else {
                $total = DB::table($table)
                ->count();
            }
            return $total;
        }
    }

    // tampil data table
    public static function showtable($table=null,$where=null)
    {
        if (!is_null($where) AND is_array($where)) {
            $show = DB::table($table)
            ->where($where[0],$where[1])
            ->get();
        } else {
            $show = DB::table($table)
            ->get();
        }
        return $show;
    }
    // tampil data table
    public static function showtablefirst($table,$where=null)
    {
        if (!is_null($where) AND is_array($where)) {
            $show = DB::table($table)
            ->where($where[0],$where[1])
            ->first();
        } else {
            $show = DB::table($table)
            ->first();
        }
        return $show;
    }
}