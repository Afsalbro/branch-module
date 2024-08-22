<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Student extends Model implements Auditable
{
    use HasFactory, AuditableTrait;

    protected $fillable = ['name', 'email'];

    public function batches()
    {
        return $this->belongsToMany(Batch::class, 'student_batch')
                    ->withPivot('assigned_label')
                    ->withTimestamps();
    }
}