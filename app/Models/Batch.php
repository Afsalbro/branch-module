<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Batch extends Model implements Auditable
{
    use HasFactory, AuditableTrait;

    protected $fillable = ['label', 'intake_start', 'intake_end', 'extended_intake_end'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_batch')
                    ->withPivot('assigned_label')
                    ->withTimestamps();
    }
}