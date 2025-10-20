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
        // dd($request->all());
        // 🔹 Validation (optional — you can expand this)
        $validator = Validator::make($request->all(), [
            'Complainant_Name' => 'nullable|string|max:255',
            'Complainant_Email' => 'nullable|email|max:255',
            'Victim_Name' => 'nullable|string|max:255',
            'Victim_Email' => 'nullable|email|max:255',
            'IncidentDescription' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // 🔹 Create Complaint (explicit mapping)
        $complaint = Complaint::create([
            'is_victim' => $request->boolean('IsVictim'),
            'complainant_name' => $request->input('Complainant_Name'),
            'complainant_business_name' => $request->input('Complainant_BusinessName'),
            'complainant_phone' => $request->input('Complainant_Phone'),
            'complainant_email' => $request->input('Complainant_Email'),
            'victim_name' => $request->input('Victim_Name'),
            'victim_age_range' => $request->input('Victim_AgeRange'),
            'victim_address1' => $request->input('Victim_Address1'),
            'victim_address2' => $request->input('Victim_Address2'),
            'victim_suite' => $request->input('Victim_Suite'),
            'victim_city' => $request->input('Victim_City'),
            'victim_county' => $request->input('Victim_County'),
            'victim_country' => $request->input('Victim_Country'),
            'victim_zipcode' => $request->input('Victim_ZipCode'),
            'victim_phone' => $request->input('Victim_Phone'),
            'victim_email' => $request->input('Victim_Email'),
            'victim_is_business' => $request->boolean('Victim_IsBusiness'),
            'victim_business_name' => $request->input('Victim_BusinessName'),
            'victim_business_impacted' => $request->boolean('Victim_BusinessImpacted'),
            'victim_it_poc' => $request->input('Victim_ItPoc'),
            'victim_other_poc' => $request->input('Victim_OtherPoc'),
            'victim_sector' => $request->input('Victim_Sector'),
            'victim_subsector' => $request->input('Victim_Subsector'),
            'money_sent' => $request->boolean('MoneySent'),
            'reported_loss' => $request->input('ReportedLoss'),
            'incident_description' => $request->input('IncidentDescription'),
            'email_headers' => $request->input('EmailHeaders'),
            'witnesses' => $request->input('Witnesses'),
            'law_enforcement' => $request->input('LawEnforcement'),
            'complaint_update' => $request->boolean('ComplaintUpdate'),
            'digital_signature' => $request->input('DigitalSignature'),
            'complaint_session' => $request->input('COMPLAINT_SESSION'),
        ]);

        // 🔹 Handle Transactions
        if ($request->has('Transactions')) {
            foreach ($request->input('Transactions') as $tx) {
                $transaction = new \App\Models\Transaction();

                $transaction->complaint_id = $complaint->id;
                $transaction->transaction_type = $tx['TransactionType'] ?? null;
                $transaction->other_type = $tx['OtherType'] ?? null;
                $transaction->was_sent = $tx['WasSent'] ?? null;
                $transaction->amount = $tx['Amount'] ?? null;
                $transaction->date = $tx['Date'] ?? null;
                $transaction->institution_notified = $tx['InstitutionNotified'] ?? null;

                // Victim Bank Info
                $transaction->victim_bank_name = $tx['VictimBankName'] ?? null;
                $transaction->victim_bank_address1 = $tx['VictimBankAddress1'] ?? null;
                $transaction->victim_bank_address2 = $tx['VictimBankAddress2'] ?? null;
                $transaction->victim_bank_mail_stop = $tx['VictimBankMailStop'] ?? null;
                $transaction->victim_bank_city = $tx['VictimBankCity'] ?? null;
                $transaction->victim_bank_country = $tx['VictimBankCountry'] ?? null;
                $transaction->victim_bank_state = $tx['VictimBankState'] ?? null;
                $transaction->victim_bank_zipcode = $tx['VictimBankZipCode'] ?? null;
                $transaction->victim_account_name = $tx['VictimAccountName'] ?? null;
                $transaction->victim_account_number = $tx['VictimAccountNumber'] ?? null;

                // Crypto / Payment Info
                $transaction->cryptocurrency_type = $tx['CryptocurrencyType'] ?? null;
                $transaction->p2p_application = $tx['P2PApplication'] ?? null;
                $transaction->transaction_id = $tx['TransactionID'] ?? null;
                $transaction->crypto_atm = $tx['CryptoATM'] ?? null;
                $transaction->gift_card_type = $tx['GiftCardType'] ?? null;
                $transaction->atm_address = $tx['ATMAddress'] ?? null;
                $transaction->atm_city = $tx['ATMCity'] ?? null;
                $transaction->atm_country = $tx['ATMCountry'] ?? null;
                $transaction->atm_state = $tx['ATMState'] ?? null;
                $transaction->atm_zipcode = $tx['ATMZipCode'] ?? null;
                $transaction->victim_account_wallet = $tx['VictimAccountWallet'] ?? null;
                $transaction->victim_account_identifier = $tx['VictimAccountIdentifier'] ?? null;
                $transaction->gift_card_number = $tx['GiftCardNumber'] ?? null;

                // Recipient Info
                $transaction->recipient_bank_name = $tx['RecipientBankName'] ?? null;
                $transaction->recipient_bank_address1 = $tx['RecipientBankAddress1'] ?? null;
                $transaction->recipient_bank_address2 = $tx['RecipientBankAddress2'] ?? null;
                $transaction->recipient_bank_mail_stop = $tx['RecipientBankMailStop'] ?? null;
                $transaction->recipient_bank_city = $tx['RecipientBankCity'] ?? null;
                $transaction->recipient_bank_country = $tx['RecipientBankCountry'] ?? null;
                $transaction->recipient_bank_state = $tx['RecipientBankState'] ?? null;
                $transaction->recipient_bank_zipcode = $tx['RecipientBankZipCode'] ?? null;
                $transaction->recipient_account_name = $tx['RecipientAccountName'] ?? null;
                $transaction->recipient_name = $tx['RecipientName'] ?? null;
                $transaction->recipient_bank_routing_number = $tx['RecipientBankRoutingNumber'] ?? null;
                $transaction->recipient_account_number = $tx['RecipientAccountNumber'] ?? null;
                $transaction->recipient_bank_swift_code = $tx['RecipientBankSwiftCode'] ?? null;
                $transaction->recipient_account_wallet = $tx['RecipientAccountWallet'] ?? null;
                $transaction->recipient_account_identifier = $tx['RecipientAccountIdentifier'] ?? null;
                $transaction->recipient_identifier = $tx['RecipientIdentifier'] ?? null;

                $transaction->save();
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
        return 123;

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
