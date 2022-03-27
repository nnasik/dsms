<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GNDivision extends Model
{
    use HasFactory;
    private $primarykey='code';
    

    public function villages(){
        return $this->hasMany(Village::class);
    }
}
