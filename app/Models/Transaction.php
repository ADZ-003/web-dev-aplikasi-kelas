<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Student;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'type', 'amount', 'description', 'transaction_date'];

    protected $casts = [
        'transaction_date' => 'date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
