<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    public function studentScores()
    {
        return $this->hasMany(StudentExamScore::class, 'exam_id');
    }
}
