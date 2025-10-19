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
        return view('complaint-form');
    }

    public function store(Request $request)
    {
        dd($request->all());
        \Log::info('Form submitted with data:', $request->all());

        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => ['required', new RecaptchaRule],
            'IsVictim' => 'required|boolean',
            'Complainant_Name' => 'required|string|max:50',
            'Complainant_BusinessName' => 'nullable|string|max:50',
            'Complainant_Phone' => 'required|string|max:50',
            'Complainant_Email' => 'required|email|max:50',
            'Victim_Name' => 'required|string|max:50',
            'Victim_AgeRange' => 'nullable|string',
            'Victim_IsMinor' => 'nullable|boolean',
            'Victim_Address1' => 'required|string|max:50',
            'Victim_Address2' => 'nullable|string|max:50',
            'Victim_Suite' => 'nullable|string|max:50',
            'Victim_City' => 'required|string|max:50',
            'Victim_County' => 'nullable|string|max:50',
            'Victim_Country' => 'required|string|max:3',
            'Victim_State' => 'nullable|string|max:2',
            'Victim_ZipCode' => 'required|string|max:20',
            'Victim_Phone' => 'required|string|max:50',
            'Victim_Email' => 'required|email|max:50',
            'Victim_IsBusiness' => 'nullable|boolean',
            'Victim_BusinessName' => 'nullable|string|max:50',
            'Victim_BusinessImpacted' => 'nullable|boolean',
            'Victim_ItPoc' => 'nullable|string|max:150',
            'Victim_OtherPoc' => 'nullable|string|max:150',
            'Victim_Sector' => 'nullable|string',
            'Victim_Subsector' => 'nullable|string',
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

            $complaint = Complaint::create([
                'is_victim' => $request->IsVictim,
                'complainant_name' => $request->Complainant_Name,
                'complainant_business_name' => $request->Complainant_BusinessName,
                'complainant_phone' => $request->Complainant_Phone,
                'complainant_email' => $request->Complainant_Email,
                'victim_name' => $request->Victim_Name,
                'victim_age_range' => $request->Victim_AgeRange,
                'victim_is_minor' => $request->Victim_IsMinor,
                'victim_address1' => $request->Victim_Address1,
                'victim_address2' => $request->Victim_Address2,
                'victim_suite' => $request->Victim_Suite,
                'victim_city' => $request->Victim_City,
                'victim_county' => $request->Victim_County,
                'victim_country' => $request->Victim_Country,
                'victim_state' => $request->Victim_State, // This might be missing in your form data
                'victim_zip_code' => $request->Victim_ZipCode,
                'victim_phone' => $request->Victim_Phone,
                'victim_email' => $request->Victim_Email,
                'victim_is_business' => $request->Victim_IsBusiness,
                'victim_business_name' => $request->Victim_BusinessName,
                'victim_business_impacted' => $request->Victim_BusinessImpacted,
                'victim_it_poc' => $request->Victim_ItPoc,
                'victim_other_poc' => $request->Victim_OtherPoc,
                'victim_sector' => $request->Victim_Sector,
                'victim_subsector' => $request->Victim_Subsector,
                'money_sent' => $request->MoneySent,
                'reported_loss' => $request->ReportedLoss,
                'incident_description' => $request->IncidentDescription,
                'email_headers' => $request->EmailHeaders,
                'witnesses' => $request->Witnesses,
                'law_enforcement' => $request->LawEnforcement,
                'complaint_update' => $request->ComplaintUpdate,
                'digital_signature' => $request->DigitalSignature,
            ]);

            // Save transactions - check if array exists and has data
            if ($request->has('Transactions') && is_array($request->Transactions)) {
                foreach ($request->Transactions as $transactionData) {
                    // Check if transaction data exists and has required fields
                    if (is_array($transactionData) && !empty($transactionData['TransactionType'])) {
                        $complaint->transactions()->create([
                            'transaction_type' => $transactionData['TransactionType'],
                            'other_type' => $transactionData['OtherType'] ?? null,
                            'was_sent' => $transactionData['WasSent'] ?? null,
                            'amount' => $transactionData['Amount'] ?? null,
                            'date' => $transactionData['Date'] ?? null,
                            'institution_notified' => $transactionData['InstitutionNotified'] ?? null,
                        ]);
                    }
                }
            }

            // Save subjects - check if array exists and has data
            if ($request->has('Subjects') && is_array($request->Subjects)) {
                foreach ($request->Subjects as $subjectData) {
                    // Check if subject data exists and has required fields
                    if (is_array($subjectData) && (!empty($subjectData['Name']) || !empty($subjectData['BusinessName']))) {
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

            // Log the actual error
            \Log::error('Complaint submission error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());

            return redirect()->back()
                ->with('error', 'There was an error submitting your complaint: ' . $e->getMessage())
                ->withInput();
        }
    }
}
