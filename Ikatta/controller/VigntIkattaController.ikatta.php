<?php
namespace Ikatta\controller;

use VigntDB;
use Outbond;

class VigntIkattaController 
{
    public function index() 
    {
        
        $data = 'Welcome to Vignt Ikatta The Simplest PHP Framework';

        $datas = [
            'Attala', 'Surya', 'Prima', 'Amanda'
        ];

        return [
            'view'  => 'index',
            'data'  => $data,
            'datas' => $datas,
        ];
    }

    public function example() 
    {
        // gunakan getOne untuk mendapatkan data pertama dan getLast untuk mendapatkan data terakhir
        // gunakan getAll() untuk mendapatkan semua data
        // jika menggunakan raw maka bind param dengan :xx ->param ('xx' => val);

        $dataz2 = VigntDB::database('local')->raw('SELECT * FROM outbond WHERE id = :id')->param(['id' => 1])->getAll();
        $dataz3 = VigntDB::database('local')->table('outbond')->whereIn('id', [1,2,3])->getAll();

        // gunakan dv untuk dump data dengan view dan dd untuk dump data dan mematikan code

        dv($dataz2);
        dd($dataz3);
    }
    
}




