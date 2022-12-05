<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pengunjung extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'email',
        'password',
        'tglLahir',
        'noTelp',
    ];

    // public function getCreatedAtAttribute(){
    //     if(!is_null($this->attributes['created_at'])){
    //         return Carbon::parse($this->attributes['created_at'])->format('Y-m-d H:i:s');
    //     }
    // }

    // public function getUpdateAtAttributes(){
    //     if(!is_null($this->attributes['updated_at'])){
    //         return Carbon::parse($this->attributes['updated_at'])->format('Y-m-d H:i:s');
    //     }
    // }
}
