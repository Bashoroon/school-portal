<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'studentusers';

    // In Promotedstudent model
    public function promotedStudents()
    {
        return $this->hasMany(PromotedStudent::class, 'admissionNo', 'admissionNo');
    }

    

}
