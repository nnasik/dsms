<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;
    public function owner()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function days()
    {
        return $this->belongsToMany(Calendar::class, 'calendar_diaries', 'diary_id', 'date')->withPivot(
            'day',
            'time',
            'nature_of_work',
            'working_place',
            'beneficiaries',
            'field_no',
            'target',
            'km',
            'note',
            'is_correct',
            'checked_on',
            'checked_by'
        );
    }

    public function checking_officer()
    {
        return $this->belongsTo(User::class, 'checked_by');
    }

    public function recommending_officer()
    {
        return $this->belongsTo(User::class, 'recommended_by');
    }

    public function approval_officer()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function notes()
    {
        return $this->morphMany(Note::class, 'notable');
    }
}
