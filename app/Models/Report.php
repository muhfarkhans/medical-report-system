<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'diagnosis',
        'treatment',
        'prescription',
        'medical_condition',
        'medical_history',
        'family_history',
        'immunizations',
        'lab_results',
        'blood_pressure',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
}
