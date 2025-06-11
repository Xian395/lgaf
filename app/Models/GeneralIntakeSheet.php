<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralIntakeSheet extends Model
{
    use HasFactory;

    protected $table = 'general_intake_sheets';

    protected $fillable = [
        'user_id',
        'client_name',
        'client_sex',
        'client_dob',
        'present_address',
        'relationship_to_beneficiary',
        'civil_status',
        'nationality',
        'occupation',
        'monthly_income',
        'religion',
        'beneficiary_name',
        'beneficiary_birthplace',
        'beneficiary_dob',
        'beneficiary_sex',
        'fam1_fullname',
        'fam1_sex',
        'fam1_birthdate',
        'fam1_status',
        'fam1_occupation',
        'fam2_fullname',
        'fam2_sex',
        'fam2_birthdate',
        'fam2_status',
        'fam2_occupation',
        'fam3_fullname',
        'fam3_sex',
        'fam3_birthdate',
        'fam3_status',
        'fam3_occupation',
        'fam4_fullname',
        'fam4_sex',
        'fam4_birthdate',
        'fam4_status',
        'fam4_occupation',
        'fam5_fullname',
        'fam5_sex',
        'fam5_birthdate',
        'fam5_status',
        'fam5_occupation',
        'problem_presented',
        'social_worker_assistance',
        'is_child_in_need',
        'is_youth_in_need',
        'is_woman_in_difficult_circumstances',
        'is_pwd',
        'is_senior',
        'needs_counseling',
        'needs_legal_assistance',
        'referral',
        'financial_food_subsidy',
        'financial_livelihood',
        'financial_educational',
        'financial_medical',
        'financial_burial',
        'financial_transportation',
        'financial_assistance_mode',
        'financial_assistance_source',
        'material_food_packs',
        'material_used_clothing',
        'material_assistive_device',
        'material_others',
        'client_signature',
        'thumb_mark',
    ];

    protected $casts = [
        'client_dob' => 'date',
        'beneficiary_dob' => 'date',
        'fam1_birthdate' => 'date',
        'fam2_birthdate' => 'date',
        'fam3_birthdate' => 'date',
        'fam4_birthdate' => 'date',
        'fam5_birthdate' => 'date',
        'is_child_in_need' => 'boolean',
        'is_youth_in_need' => 'boolean',
        'is_woman_in_difficult_circumstances' => 'boolean',
        'is_pwd' => 'boolean',
        'is_senior' => 'boolean',
        'needs_counseling' => 'boolean',
        'needs_legal_assistance' => 'boolean',
        'financial_food_subsidy' => 'boolean',
        'financial_livelihood' => 'boolean',
        'financial_educational' => 'boolean',
        'financial_medical' => 'boolean',
        'financial_burial' => 'boolean',
        'financial_transportation' => 'boolean',
        'material_food_packs' => 'boolean',
        'material_used_clothing' => 'boolean',
        'material_assistive_device' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}