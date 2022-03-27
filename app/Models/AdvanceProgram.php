<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceProgram extends Model
{
    use HasFactory;

    //protected $primaryKey = 'id';

    public function user(){

    }

    public function days(){
        return $this->belongsToMany(Calendar::class, 'advance_program_calendar', 'advance_program_id', 'date')->withPivot('day','time','nature_of_work','working_place','beneficiaries','field_no','target','km');
    }

}
