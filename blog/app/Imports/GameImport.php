<?php

namespace App\Imports;

use App\Game
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;

class GameImport implements ToModel
{
    public function model(array $row)
    {
        return new Game
            'name'  => $row[0],
            'description'=> $row[1],
            'price'     => $row[2],
        
        ]);
    }
}