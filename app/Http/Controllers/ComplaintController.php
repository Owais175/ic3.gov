<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    public function index()
    {
        return view('complaint-form');
    }

    public function submitComplaint(Request $request)
    {
        \Log::info('Form submission started', $request->all());

        // Custom validation rules
        $validator = Validator::make($request->all(), [
            // Step 1
            'IsVictim' => 'required|in:true,false',
            'Complainant.Name' => 'required|string|max:50',
            'Complainant.BusinessName' => 'nullable|string|max:50',
            'Complainant.Phone' => 'required|string|max:50|regex:/^\d+$/',
            'Complainant.Email' => 'required|email|max:50',

            // Step 2 - Victim Info
            'Victim.Name' => 'required|string|max:50',
            'Victim.AgeRange' => 'nullable|string',
            'Victim.IsMinor' => 'nullable|in:true,false',
            'Victim.Address1' => 'required|string|max:50',
            'Victim.Address2' => 'nullable|string|max:50',
            'Victim.Suite' => 'nullable|string|max:50',
            'Victim.City' => 'required|string|max:50',
            'Victim.County' => 'nullable|string|max:50',
            'Victim.Country' => 'required|string',
            'Victim.State' => 'nullable|string|required_if:Victim.Country,USA',
            'Victim.ZipCode' => 'required|string|max:20',
            'Victim.Phone' => 'required|string|max:50|regex:/^\d+$/',
            'Victim.Email' => 'required|email|max:50',

            // Step 2 - Business Info
            'Victim.IsBusiness' => 'nullable|in:true,false',
            'Victim.BusinessName' => 'required_if:Victim.IsBusiness,true|nullable|string|max:50',
            'Victim.BusinessImpacted' => 'required_if:Victim.IsBusiness,true|nullable|in:true,false',
            'Victim.ItPoc' => 'nullable|string|max:150',
            'Victim.OtherPoc' => 'nullable|string|max:150',
            'Victim.Sector' => 'nullable|string',
            'Victim.Subsector' => 'nullable|string',

            // Step 3
            'MoneySent' => 'required|in:true,false',
            'ReportedLoss' => 'required_if:MoneySent,true|nullable|numeric|min:0|max:9999999999.99',

            // Transactions
            'Transactions' => 'nullable|array',
            'Transactions.*.TransactionType' => 'required_with:Transactions|string',
            'Transactions.*.OtherType' => 'required_if:Transactions.*.TransactionType,8|nullable|string|max:50',
            'Transactions.*.WasSent' => 'nullable|in:true,false',
            'Transactions.*.Amount' => 'nullable|numeric|min:0|max:999999999.99',
            'Transactions.*.Date' => 'nullable|date|before_or_equal:today',

            // Subjects
            'Subjects' => 'nullable|array',
            'Subjects.*.Name' => 'nullable|string|max:50',
            'Subjects.*.BusinessName' => 'nullable|string|max:50',
            'Subjects.*.Email' => 'nullable|email|max:50',
            'Subjects.*.Phone' => 'nullable|string|max:20',
            'Subjects.*.IPAddress' => 'nullable|ip',

            // Step 5
            'IncidentDescription' => 'required|string|max:3500',

            // Step 6
            'EmailHeaders' => 'nullable|string|max:5000',
            'Witnesses' => 'nullable|string|max:1000',
            'LawEnforcement' => 'nullable|string|max:1000',
            'ComplaintUpdate' => 'nullable|in:true,false',

            // Step 7
            'DigitalSignature' => 'required|string|max:50',
            'g-recaptcha-response' => 'required'
        ], [
            'required' => 'This field is required.',
            'required_if' => 'This field is required.',
            'email' => 'Please enter a valid email address.',
            'numeric' => 'Please enter a valid number.',
            'regex' => 'Please enter numbers only.',
            'ip' => 'Please enter a valid IP address.',
            'before_or_equal' => 'Date cannot be in the future.'
        ]);

        if ($validator->fails()) {
            \Log::error('Validation failed', $validator->errors()->toArray());

            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('scroll_to_errors', true);
        }

        // Verify reCAPTCHA
        $recaptchaResponse = $request->input('g-recaptcha-response');
        $recaptchaSecret = env('RECAPTCHA_SECRET_KEY');

        if ($recaptchaSecret) {
            $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecret}&response={$recaptchaResponse}");
            $captcha_success = json_decode($verify);

            if (!$captcha_success->success) {
                return redirect()->back()
                    ->withErrors(['g-recaptcha-response' => 'Please complete the reCAPTCHA verification.'])
                    ->withInput()
                    ->with('scroll_to_errors', true);
            }
        }

        try {
            DB::beginTransaction();

            // Generate complaint number
            $complaintCount = DB::table('complaints')->count() + 1;
            $complaintNumber = 'IC3-' . date('YmdHis') . '-' . str_pad($complaintCount, 6, '0', STR_PAD_LEFT);

            // Insert main complaint
            $complaintId = DB::table('complaints')->insertGetId([
                // Step 1
                'is_victim' => $request->input('IsVictim') === 'true',
                'complainant_name' => $request->input('Complainant.Name'),
                'complainant_business_name' => $request->input('Complainant.BusinessName'),
                'complainant_phone' => $request->input('Complainant.Phone'),
                'complainant_email' => $request->input('Complainant.Email'),

                // Step 2
                'victim_name' => $request->input('Victim.Name'),
                'victim_age_range' => $request->input('Victim.AgeRange'),
                'victim_is_minor' => $request->input('Victim.IsMinor') === 'true',
                'victim_address1' => $request->input('Victim.Address1'),
                'victim_address2' => $request->input('Victim.Address2'),
                'victim_suite' => $request->input('Victim.Suite'),
                'victim_city' => $request->input('Victim.City'),
                'victim_county' => $request->input('Victim.County'),
                'victim_country' => $request->input('Victim.Country'),
                'victim_state' => $request->input('Victim.State'),
                'victim_zip_code' => $request->input('Victim.ZipCode'),
                'victim_phone' => $request->input('Victim.Phone'),
                'victim_email' => $request->input('Victim.Email'),

                // Business info
                'victim_is_business' => $request->input('Victim.IsBusiness') === 'true',
                'victim_business_name' => $request->input('Victim.BusinessName'),
                'victim_business_impacted' => $request->input('Victim.BusinessImpacted') === 'true',
                'victim_it_poc' => $request->input('Victim.ItPoc'),
                'victim_other_poc' => $request->input('Victim.OtherPoc'),
                'victim_sector' => $request->input('Victim.Sector'),
                'victim_subsector' => $request->input('Victim.Subsector'),

                // Step 3
                'money_sent' => $request->input('MoneySent') === 'true',
                'reported_loss' => $request->input('ReportedLoss'),

                // Step 5
                'incident_description' => $request->input('IncidentDescription'),

                // Step 6
                'email_headers' => $request->input('EmailHeaders'),
                'witnesses' => $request->input('Witnesses'),
                'law_enforcement' => $request->input('LawEnforcement'),
                'complaint_update' => $request->input('ComplaintUpdate') === 'true',

                // Step 7
                'digital_signature' => $request->input('DigitalSignature'),

                // Metadata
                'complaint_number' => $complaintNumber,
                'status' => 'submitted',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // Insert transactions
            if ($request->has('Transactions')) {
                $transactions = [];
                foreach ($request->input('Transactions') as $transaction) {
                    if (!empty($transaction['TransactionType'])) {
                        $transactions[] = [
                            'complaint_id' => $complaintId,
                            'transaction_type' => $transaction['TransactionType'],
                            'other_type' => $transaction['OtherType'] ?? null,
                            'was_sent' => isset($transaction['WasSent']) ? $transaction['WasSent'] === 'true' : null,
                            'amount' => $transaction['Amount'] ?? null,
                            'date' => $transaction['Date'] ?? null,
                            'institution_notified' => isset($transaction['InstitutionNotified']) ? $transaction['InstitutionNotified'] === 'true' : null,
                            'victim_bank_name' => $transaction['VictimBankName'] ?? null,
                            'victim_account_number' => $transaction['VictimAccountNumber'] ?? null,
                            'recipient_bank_name' => $transaction['RecipientBankName'] ?? null,
                            'recipient_account_number' => $transaction['RecipientAccountNumber'] ?? null,
                            'created_at' => now(),
                            'updated_at' => now()
                        ];
                    }
                }
                if (!empty($transactions)) {
                    DB::table('transactions')->insert($transactions);
                }
            }

            // Insert subjects
            if ($request->has('Subjects')) {
                $subjects = [];
                foreach ($request->input('Subjects') as $subject) {
                    if (!empty($subject['Name']) || !empty($subject['BusinessName'])) {
                        $subjects[] = [
                            'complaint_id' => $complaintId,
                            'name' => $subject['Name'] ?? null,
                            'business_name' => $subject['BusinessName'] ?? null,
                            'address1' => $subject['Address1'] ?? null,
                            'city' => $subject['City'] ?? null,
                            'country' => $subject['Country'] ?? null,
                            'state' => $subject['State'] ?? null,
                            'zip_code' => $subject['ZipCode'] ?? null,
                            'phone' => $subject['Phone'] ?? null,
                            'email' => $subject['Email'] ?? null,
                            'website' => $subject['Website'] ?? null,
                            'ip_address' => $subject['IPAddress'] ?? null,
                            'created_at' => now(),
                            'updated_at' => now()
                        ];
                    }
                }
                if (!empty($subjects)) {
                    DB::table('subjects')->insert($subjects);
                }
            }

            DB::commit();

            return redirect()->back()
                ->with('success', 'Complaint submitted successfully! Your complaint number is: ' . $complaintNumber);
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Database error: ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Failed to submit complaint. Please try again.')
                ->withInput();
        }
    }
}
