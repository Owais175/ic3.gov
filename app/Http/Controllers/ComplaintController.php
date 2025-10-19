<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    public function index()
    {
        return view('complaint-form');
    }

    public function store(Request $request)
    {
        // 🔹 Validation (optional — you can expand this)
        $validator = Validator::make($request->all(), [
            'Complainant.Name' => 'nullable|string|max:255',
            'Complainant.Email' => 'nullable|email|max:255',
            'Victim.Name' => 'nullable|string|max:255',
            'Victim.Email' => 'nullable|email|max:255',
            'IncidentDescription' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // 🔹 Create Complaint (explicit mapping)
        $complaint = Complaint::create([
            'is_victim' => filter_var($request->input('IsVictim'), FILTER_VALIDATE_BOOLEAN),
            'complainant_name' => $request->input('Complainant.Name'),
            'complainant_business_name' => $request->input('Complainant.BusinessName'),
            'complainant_phone' => $request->input('Complainant.Phone'),
            'complainant_email' => $request->input('Complainant.Email'),
            'victim_name' => $request->input('Victim.Name'),
            'victim_age_range' => $request->input('Victim.AgeRange'),
            'victim_is_minor' => filter_var($request->input('Victim.IsMinor'), FILTER_VALIDATE_BOOLEAN),
            'victim_address1' => $request->input('Victim.Address1'),
            'victim_address2' => $request->input('Victim.Address2'),
            'victim_suite' => $request->input('Victim.Suite'),
            'victim_city' => $request->input('Victim.City'),
            'victim_county' => $request->input('Victim.County'),
            'victim_country' => $request->input('Victim.Country'),
            'victim_state' => $request->input('Victim.State'),
            'victim_zipcode' => $request->input('Victim.ZipCode'),
            'victim_phone' => $request->input('Victim.Phone'),
            'victim_email' => $request->input('Victim.Email'),
            'victim_is_business' => filter_var($request->input('Victim.IsBusiness'), FILTER_VALIDATE_BOOLEAN),
            'victim_business_name' => $request->input('Victim.BusinessName'),
            'victim_business_impacted' => $request->input('Victim.BusinessImpacted'),
            'victim_it_poc' => $request->input('Victim.ItPoc'),
            'victim_other_poc' => $request->input('Victim.OtherPoc'),
            'victim_sector' => $request->input('Victim.Sector'),
            'victim_subsector' => $request->input('Victim.Subsector'),
            'money_sent' => filter_var($request->input('MoneySent'), FILTER_VALIDATE_BOOLEAN),
            'reported_loss' => $request->input('ReportedLoss'),
            'incident_description' => $request->input('IncidentDescription'),
            'email_headers' => $request->input('EmailHeaders'),
            'witnesses' => $request->input('Witnesses'),
            'law_enforcement' => $request->input('LawEnforcement'),
            'complaint_update' => $request->input('ComplaintUpdate'),
            'digital_signature' => $request->input('DigitalSignature'),
            'complaint_session' => $request->input('COMPLAINT_SESSION'),
        ]);

        // 🔹 Handle Transactions
        if ($request->has('Transactions')) {
            foreach ($request->input('Transactions') as $tx) {
                $complaint->transactions()->create([
                    'transaction_type' => $tx['TransactionType'] ?? null,
                    'other_type' => $tx['OtherType'] ?? null,
                    'was_sent' => $tx['WasSent'] ?? null,
                    'amount' => $tx['Amount'] ?? null,
                    'date' => $tx['Date'] ?? null,
                    'institution_notified' => $tx['InstitutionNotified'] ?? null,
                    'victim_bank_name' => $tx['VictimBankName'] ?? null,
                    'victim_bank_address1' => $tx['VictimBankAddress1'] ?? null,
                    'victim_bank_address2' => $tx['VictimBankAddress2'] ?? null,
                    'victim_bank_mail_stop' => $tx['VictimBankMailStop'] ?? null,
                    'victim_bank_city' => $tx['VictimBankCity'] ?? null,
                    'victim_bank_country' => $tx['VictimBankCountry'] ?? null,
                    'victim_bank_state' => $tx['VictimBankState'] ?? null,
                    'victim_bank_zipcode' => $tx['VictimBankZipCode'] ?? null,
                    'victim_account_name' => $tx['VictimAccountName'] ?? null,
                    'victim_account_number' => $tx['VictimAccountNumber'] ?? null,
                    'cryptocurrency_type' => $tx['CryptocurrencyType'] ?? null,
                    'p2p_application' => $tx['P2PApplication'] ?? null,
                    'transaction_id' => $tx['TransactionID'] ?? null,
                    'crypto_atm' => $tx['CryptoATM'] ?? null,
                    'gift_card_type' => $tx['GiftCardType'] ?? null,
                    'atm_address' => $tx['ATMAddress'] ?? null,
                    'atm_city' => $tx['ATMCity'] ?? null,
                    'atm_country' => $tx['ATMCountry'] ?? null,
                    'atm_state' => $tx['ATMState'] ?? null,
                    'atm_zipcode' => $tx['ATMZipCode'] ?? null,
                    'victim_account_wallet' => $tx['VictimAccountWallet'] ?? null,
                    'victim_account_identifier' => $tx['VictimAccountIdentifier'] ?? null,
                    'gift_card_number' => $tx['GiftCardNumber'] ?? null,
                    'recipient_bank_name' => $tx['RecipientBankName'] ?? null,
                    'recipient_bank_address1' => $tx['RecipientBankAddress1'] ?? null,
                    'recipient_bank_address2' => $tx['RecipientBankAddress2'] ?? null,
                    'recipient_bank_mail_stop' => $tx['RecipientBankMailStop'] ?? null,
                    'recipient_bank_city' => $tx['RecipientBankCity'] ?? null,
                    'recipient_bank_country' => $tx['RecipientBankCountry'] ?? null,
                    'recipient_bank_state' => $tx['RecipientBankState'] ?? null,
                    'recipient_bank_zipcode' => $tx['RecipientBankZipCode'] ?? null,
                    'recipient_account_name' => $tx['RecipientAccountName'] ?? null,
                    'recipient_name' => $tx['RecipientName'] ?? null,
                    'recipient_bank_routing_number' => $tx['RecipientBankRoutingNumber'] ?? null,
                    'recipient_account_number' => $tx['RecipientAccountNumber'] ?? null,
                    'recipient_bank_swift_code' => $tx['RecipientBankSwiftCode'] ?? null,
                    'recipient_account_wallet' => $tx['RecipientAccountWallet'] ?? null,
                    'recipient_account_identifier' => $tx['RecipientAccountIdentifier'] ?? null,
                    'recipient_identifier' => $tx['RecipientIdentifier'] ?? null,
                ]);
            }
        }

        // 🔹 Handle Subjects
        if ($request->has('Subjects')) {
            foreach ($request->input('Subjects') as $subject) {
                $complaint->subjects()->create([
                    'name' => $subject['Name'] ?? null,
                    'business_name' => $subject['BusinessName'] ?? null,
                    'address1' => $subject['Address1'] ?? null,
                    'address2' => $subject['Address2'] ?? null,
                    'mail_stop' => $subject['MailStop'] ?? null,
                    'city' => $subject['City'] ?? null,
                    'country' => $subject['Country'] ?? null,
                    'state' => $subject['State'] ?? null,
                    'zipcode' => $subject['ZipCode'] ?? null,
                    'phone' => $subject['Phone'] ?? null,
                    'email' => $subject['Email'] ?? null,
                    'website' => $subject['Website'] ?? null,
                    'ip_address' => $subject['IPAddress'] ?? null,
                ]);
            }
        }

        return redirect()
            ->back()
            ->with('success', 'Complaint created successfully ✅');
    }


    public function show($id)
    {
        $complaint = Complaint::with(['transactions', 'subjects'])->findOrFail($id);
        return response()->json($complaint);
    }
}
