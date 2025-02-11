<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Support\Facades\DB;

class MatkulController extends Controller{
    public function index(){}
    //Raw

    public function insertRaw(){
        $data = DB::insert("INSERT INTO matakuliah 
        (kode_mk,nama_mk) VALUES ('01','Framework Pemrograman Web')");
        dump($data);
       }
    public function selectRaw(){
        $data=DB::select("SELECT * FROM matakuliah");
        dump($data);
    }
    public function updateRaw(){
        $data = DB::update("UPDATE matakuliah SET nama_mk='Pemrograman Berbasis Mobile' WHERE nama_mk='Framework Pemrograman Web'");
        dump($data);
       }
    public function deleteRaw(){
        $data = DB::delete("DELETE FROM matakuliah WHERE nama_mk='Pemrograman Berbasis Mobile'");
        dump($data);
       }

    //QueryBuilder

   public function insertQueryBuilder(){
    $data = DB::table('matakuliah')->insert(
        [
            'kode_mk' => '02',
            'nama_mk' => 'Data Mining',
        ]
        );
    dump($data);
   }
   public function selectQueryBuilder(){
    $data=DB::table("matakuliah")->get();
    dump($data);
   }
   public function updateQueryBuilder(){
    $data = DB::table('matakuliah')
    ->where('nama_mk', 'Data Mining',)
    ->update(
        [
            'updated_at' => now(),
        ]
        );
    dump($data);
   }
   public function deleteQueryBuilder(){
    $data = DB::table('matakuliah')
    ->where('nama_mk', 'Data Mining')
    ->delete();
    dump($data);
   } 
   //Eloquent
   public function insertEloquent(){
    Matkul::create(
        [
            'kode_mk' => '03',
            'nama_mk' => 'Blockchain',
        ]
        );
    return "Data Berhasil Disimpan";
   }
   public function selectEloquent(){
    $data = Matkul::all();
    dump($data);
   }
   public function updateEloquent(){
    Matkul::where('nama_mk', 'Blockchain')->first()->update([
        'nama_mk' => 'Cloud Computing'
    ]);
    return "Data Berhasil di Ubah";
   }
   public function deleteEloquent(){
    $data = Matkul::where('nama_mk', 'Cloud Computing')->delete();
    return "Data Berhasil Dihapus";
    }
}