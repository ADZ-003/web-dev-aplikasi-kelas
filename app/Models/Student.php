<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SchoolClass;
use App\Models\Transaction;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'nis', 'class_id'];

    public function class()
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
