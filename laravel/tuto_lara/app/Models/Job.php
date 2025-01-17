<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ["position","salary"];


    public function employer(){
        return $this->belongsTo(Employer::class,"employer_id");
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
