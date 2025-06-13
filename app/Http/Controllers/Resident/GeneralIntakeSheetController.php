<?php

namespace App\Http\Controllers\Resident;

use App\Http\Controllers\Controller;

use App\Models\GeneralIntakeSheet;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class GeneralIntakeSheetController extends Controller
{
    public function index()
    {
        return Inertia::render('Resident/Assistance/Index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_sex' => 'required|in:Male,Female,Other',
            'client_dob' => 'required|date',
            'present_address' => 'required|string|max:255',
            'relationship_to_beneficiary' => 'nullable|string|max:255',
            'civil_status' => 'required|in:Single,Married,Widowed,Separated,Divorced',
            'nationality' => 'required|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'monthly_income' => 'nullable|numeric|min:0',
            'religion' => 'nullable|string|max:255',
            'beneficiary_name' => 'required|string|max:255',
            'beneficiary_birthplace' => 'required|string|max:255',
            'beneficiary_dob' => 'required|date',
            'beneficiary_sex' => 'required|in:Male,Female,Other',
            'fam1_fullname' => 'nullable|string|max:255',
            'fam1_sex' => 'nullable|in:Male,Female,Other',
            'fam1_birthdate' => 'nullable|date',
            'fam1_status' => 'nullable|in:Single,Married,Widowed,Separated,Divorced',
            'fam1_occupation' => 'nullable|string|max:255',
            'fam2_fullname' => 'nullable|string|max:255',
            'fam2_sex' => 'nullable|in:Male,Female,Other',
            'fam2_birthdate' => 'nullable|date',
            'fam2_status' => 'nullable|in:Single,Married,Widowed,Separated,Divorced',
            'fam2_occupation' => 'nullable|string|max:255',
            'fam3_fullname' => 'nullable|string|max:255',
            'fam3_sex' => 'nullable|in:Male,Female,Other',
            'fam3_birthdate' => 'nullable|date',
            'fam3_status' => 'nullable|in:Single,Married,Widowed,Separated,Divorced',
            'fam3_occupation' => 'nullable|string|max:255',
            'fam4_fullname' => 'nullable|string|max:255',
            'fam4_sex' => 'nullable|in:Male,Female,Other',
            'fam4_birthdate' => 'nullable|date',
            'fam4_status' => 'nullable|in:Single,Married,Widowed,Separated,Divorced',
            'fam4_occupation' => 'nullable|string|max:255',
            'fam5_fullname' => 'nullable|string|max:255',
            'fam5_sex' => 'nullable|in:Male,Female,Other',
            'fam5_birthdate' => 'nullable|date',
            'fam5_status' => 'nullable|in:Single,Married,Widowed,Separated,Divorced',
            'fam5_occupation' => 'nullable|string|max:255',
            'problem_presented' => 'required|string|max:1000',
            'social_worker_assistance' => 'nullable|string|max:1000',
            'is_child_in_need' => 'boolean',
            'is_youth_in_need' => 'boolean',
            'is_woman_in_difficult_circumstances' => 'boolean',
            'is_pwd' => 'boolean',
            'is_senior' => 'boolean',
            'needs_counseling' => 'boolean',
            'needs_legal_assistance' => 'boolean',
            'referral' => 'nullable|string|max:255',
            'financial_food_subsidy' => 'boolean',
            'financial_livelihood' => 'boolean',
            'financial_educational' => 'boolean',
            'financial_medical' => 'boolean',
            'financial_burial' => 'boolean',
            'financial_transportation' => 'boolean',
            'financial_assistance_mode' => 'nullable|string|max:255',
            'financial_assistance_source' => 'nullable|string|max:255',
            'material_food_packs' => 'boolean',
            'material_used_clothing' => 'boolean',
            'material_assistive_device' => 'boolean',
            'material_others' => 'nullable|string|max:255',
            'client_signature' => 'nullable|string|max:255',
            'thumb_mark' => 'nullable|string|max:255',
            'status' => 'nullable|in:PENDING,IN_PROGRESS,VERIFIED,REJECTED',
        ]);

        GeneralIntakeSheet::create(array_merge($validated, ['user_id' => Auth::id()]));

        return redirect()->route('resident.dashboard')->with('success', 'Assistance request submitted successfully.');
    }
}