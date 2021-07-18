<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getDateStartAttribute(){
        return Carbon::parse($this->attributes['date_start'])
            ->translatedFormat('d F y, l');
    }
    public function getDateEndAttribute(){
        return Carbon::parse($this->attributes['date_end'])
            ->translatedFormat('d F y, l');
    }
    public function getTimeStartAttribute(){
        return Carbon::parse($this->attributes['time_start'])
            ->translatedFormat('H:i');
    }
    public function getTimeEndAttribute(){
        return Carbon::parse($this->attributes['time_end'])
            ->translatedFormat('H:i');
    }
}
