<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = [
        'firstname',
        'lastname',
        'company_id',
        'email',
        'phone',
    ];

    public function company()
    {
        return $this->belongsTo(Companies::class);
    }
}
