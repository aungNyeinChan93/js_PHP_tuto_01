<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UuidTest extends Model
{
    use HasFactory;

    // use HasUuids;

    protected $fillable =["title"];

    protected $table = "uuid_tests";
}
