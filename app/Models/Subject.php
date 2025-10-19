<?php

namespace App\Models;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'complaint_id',
        'name',
        'business_name',
        'address1',
        'address2',
        'mail_stop',
        'city',
        'country',
        'state',
        'zipcode',
        'phone',
        'email',
        'website',
        'ip_address'
    ];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
