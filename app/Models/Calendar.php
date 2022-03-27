<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model{
    use HasFactory;

    protected $primaryKey = 'date';
    public $incrementing = false;
    protected $keyType = 'string';


    public function advanceprograms(){
        return $this->belongsToMany(AdvanceProgram::class, 'advance_program_calendar', 'date', 'advance_program_id');
    }
    
}
