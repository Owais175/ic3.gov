<?php
// app/Models/Complaint.php

namespace App\Models;

use App\Models\Subject;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Complaint extends Model
{
    use HasFactory;

    protected $except = [
        'complaint'
    ];

    protected $fillable = [
        // Step 1 - Who is Filing
        'is_victim',

        // Complainant Information
        'complainant_name',
        'complainant_business_name',
        'complainant_phone',
        'complainant_email',

        // Victim Information  
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
        'victim_zip_code',
        'victim_phone',
        'victim_email',

        // Business Information
        'victim_is_business',
        'victim_business_name',
        'victim_business_impacted',
        'victim_it_poc',
        'victim_other_poc',
        'victim_sector',
        'victim_subsector',

        // Financial Transactions (Summary)
        'money_sent',
        'reported_loss',

        // Incident Description
        'incident_description',

        // Other Information
        'email_headers',
        'witnesses',
        'law_enforcement',
        'complaint_update',

        // Privacy & Signature
        'digital_signature',

        // Additional fields from form that are missing
        'session_token', // COMPLAINT_SESSION hidden field
        'recaptcha_response', // g-recaptcha-response
    ];

    protected $casts = [
        'is_victim' => 'boolean',
        'victim_is_minor' => 'boolean',
        'victim_is_business' => 'boolean',
        'victim_business_impacted' => 'boolean',
        'money_sent' => 'boolean',
        'complaint_update' => 'boolean',
        'reported_loss' => 'decimal:2',
    ];

    // Relationships
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
