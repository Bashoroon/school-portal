<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class   Promotedstudent extends Model
{
    use HasFactory;
    protected $table = 'promotedstudent';


    public function student()
    {
        return $this->belongsTo(Student::class, 'admissionNo', 'admissionNo');
    }
}

