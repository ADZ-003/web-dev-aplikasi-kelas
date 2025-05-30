<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SchoolClass;

class Major extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function classes()
    {
        return $this->hasMany(SchoolClass::class);
    }
}
