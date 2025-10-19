<?php

namespace App\Models;

use App\Models\Subject;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $fillable = [
        'is_victim',
        'complainant_name',
        'complainant_business_name',
        'complainant_phone',
        'complainant_email',
        'victim_name',
        'victim_age_range',
        'victim_is_minor',
        'victim_address1',
        'victim_address2',
        'victim_suite',
        'victim_city',
        'victim_county',
        'victim_country',
        'victim_state',
        'victim_zipcode',
        'victim_phone',
        'victim_email',
        'victim_is_business',
        'victim_business_name',
        'victim_business_impacted',
        'victim_it_poc',
        'victim_other_poc',
        'victim_sector',
        'victim_subsector',
        'money_sent',
        'reported_loss',
        'incident_description',
        'email_headers',
        'witnesses',
        'law_enforcement',
        'complaint_update',
        'digital_signature',
        'complaint_session'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
