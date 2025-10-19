<?php
// app/Models/Transaction.php

namespace App\Models;

use App\Models\Complaint;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'complaint_id',
        'transaction_type',
        'other_type',
        'was_sent',
        'amount',
        'date',
        'institution_notified',
        'victim_bank_name',
        'victim_bank_address1',
        'victim_bank_address2',
        'victim_bank_mail_stop',
        'victim_bank_city',
        'victim_bank_country',
        'victim_bank_state',
        'victim_bank_zip_code',
        'victim_account_name',
        'victim_account_number',
        'cryptocurrency_type',
        'p2p_application',
        'transaction_id',
        'crypto_atm',
        'atm_address',
        'atm_city',
        'atm_country',
        'atm_state',
        'atm_zip_code',
        'victim_account_wallet',
        'victim_account_identifier',
        'gift_card_type',
        'gift_card_number',
        'recipient_bank_name',
        'recipient_bank_address1',
        'recipient_bank_address2',
        'recipient_bank_mail_stop',
        'recipient_bank_city',
        'recipient_bank_country',
        'recipient_bank_state',
        'recipient_bank_zip_code',
        'recipient_account_name',
        'recipient_name',
        'recipient_bank_routing_number',
        'recipient_account_number',
        'recipient_bank_swift_code',
        'recipient_account_wallet',
        'recipient_account_identifier',
        'recipient_identifier'
    ];

    protected $casts = [
        'was_sent' => 'boolean',
        'institution_notified' => 'boolean',
        'amount' => 'decimal:2',
        'date' => 'date'
    ];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
}
