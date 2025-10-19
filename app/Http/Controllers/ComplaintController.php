<?php
// app/Http/Controllers/ComplaintController.php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Complaint;
use App\Models\Transaction;
use App\Rules\RecaptchaRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    public function create()
    {
        return view('front.app'); // Your existing view
    }

    public function store(Request $request)
    {
        // Validate the main complaint data
        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => ['required', new RecaptchaRule],
            'IsVictim' => 'required|boolean',
            'Complainant.Name' => 'required|string|max:50',
            'Complainant.BusinessName' => 'nullable|string|max:50',
            'Complainant.Phone' => 'required|string|max:50',
            'Complainant.Email' => 'required|email|max:50',
            'Victim.Name' => 'required|string|max:50',
            'Victim.AgeRange' => 'nullable|string',
            'Victim.IsMinor' => 'nullable|boolean',
            'Victim.Address1' => 'required|string|max:50',
            'Victim.Address2' => 'nullable|string|max:50',
            'Victim.Suite' => 'nullable|string|max:50',
            'Victim.City' => 'required|string|max:50',
            'Victim.County' => 'nullable|string|max:50',
            'Victim.Country' => 'required|string|max:3',
            'Victim.State' => 'nullable|string|max:2',
            'Victim.ZipCode' => 'required|string|max:20',
            'Victim.Phone' => 'required|string|max:50',
            'Victim.Email' => 'required|email|max:50',
            'Victim.IsBusiness' => 'nullable|boolean',
            'Victim.BusinessName' => 'nullable|string|max:50',
            'Victim.BusinessImpacted' => 'nullable|boolean',
            'Victim.ItPoc' => 'nullable|string|max:150',
            'Victim.OtherPoc' => 'nullable|string|max:150',
            'Victim.Sector' => 'nullable|string',
            'Victim.Subsector' => 'nullable|string',
            'MoneySent' => 'required|boolean',
            'ReportedLoss' => 'nullable|numeric|min:0|max:9999999999.99',
            'IncidentDescription' => 'required|string|max:3500',
            'EmailHeaders' => 'nullable|string|max:5000',
            'Witnesses' => 'nullable|string|max:1000',
            'LawEnforcement' => 'nullable|string|max:1000',
            'ComplaintUpdate' => 'nullable|boolean',
            'DigitalSignature' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();
        try {
            // Create main complaint
            $complaint = Complaint::create([
                'is_victim' => $request->IsVictim,
                'complainant_name' => $request->input('Complainant.Name'),
                'complainant_business_name' => $request->input('Complainant.BusinessName'),
                'complainant_phone' => $request->input('Complainant.Phone'),
                'complainant_email' => $request->input('Complainant.Email'),
                'victim_name' => $request->input('Victim.Name'),
                'victim_age_range' => $request->input('Victim.AgeRange'),
                'victim_is_minor' => $request->input('Victim.IsMinor'),
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
                'victim_is_business' => $request->input('Victim.IsBusiness'),
                'victim_business_name' => $request->input('Victim.BusinessName'),
                'victim_business_impacted' => $request->input('Victim.BusinessImpacted'),
                'victim_it_poc' => $request->input('Victim.ItPoc'),
                'victim_other_poc' => $request->input('Victim.OtherPoc'),
                'victim_sector' => $request->input('Victim.Sector'),
                'victim_subsector' => $request->input('Victim.Subsector'),
                'money_sent' => $request->MoneySent,
                'reported_loss' => $request->ReportedLoss,
                'incident_description' => $request->IncidentDescription,
                'email_headers' => $request->EmailHeaders,
                'witnesses' => $request->Witnesses,
                'law_enforcement' => $request->LawEnforcement,
                'complaint_update' => $request->ComplaintUpdate,
                'digital_signature' => $request->DigitalSignature,
            ]);

            // Save transactions
            if ($request->has('Transactions')) {
                foreach ($request->Transactions as $transactionData) {
                    if (!empty($transactionData['TransactionType'])) {
                        $complaint->transactions()->create([
                            'transaction_type' => $transactionData['TransactionType'],
                            'other_type' => $transactionData['OtherType'] ?? null,
                            'was_sent' => $transactionData['WasSent'] ?? null,
                            'amount' => $transactionData['Amount'] ?? null,
                            'date' => $transactionData['Date'] ?? null,
                            'institution_notified' => $transactionData['InstitutionNotified'] ?? null,
                            // Add other transaction fields...
                        ]);
                    }
                }
            }

            // Save subjects
            if ($request->has('Subjects')) {
                foreach ($request->Subjects as $subjectData) {
                    if (!empty($subjectData['Name']) || !empty($subjectData['BusinessName'])) {
                        $complaint->subjects()->create([
                            'name' => $subjectData['Name'] ?? null,
                            'business_name' => $subjectData['BusinessName'] ?? null,
                            'address1' => $subjectData['Address1'] ?? null,
                            'address2' => $subjectData['Address2'] ?? null,
                            'mail_stop' => $subjectData['MailStop'] ?? null,
                            'city' => $subjectData['City'] ?? null,
                            'country' => $subjectData['Country'] ?? null,
                            'state' => $subjectData['State'] ?? null,
                            'zip_code' => $subjectData['ZipCode'] ?? null,
                            'phone' => $subjectData['Phone'] ?? null,
                            'email' => $subjectData['Email'] ?? null,
                            'website' => $subjectData['Website'] ?? null,
                            'ip_address' => $subjectData['IPAddress'] ?? null,
                        ]);
                    }
                }
            }

            DB::commit();

            return redirect()->route('complaint.create')
                ->with('success', 'Your complaint has been submitted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'There was an error submitting your complaint. Please try again.')
                ->withInput();
        }
    }
}
