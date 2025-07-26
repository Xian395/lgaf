<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>General Intake Sheet</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.2;
            margin: 0;
            padding: 20px;
            background: white;
        }
        
        .header {
            text-align: center;
            margin-bottom: 15px;
        }
        
        .header h1 {
            font-size: 16px;
            margin: 0 0 5px 0;
            font-weight: bold;
        }
        
        .header p {
            font-size: 11px;
            margin: 1px 0;
        }
        
        .case-info {
            position: absolute;
            top: 20px;
            right: 20px;
            border: 1px solid #000;
            padding: 8px;
            font-size: 11px;
            background: white;
        }
        
        .form-row {
            display: flex;
            margin-bottom: 8px;
            align-items: center;
        }
        
        .form-group {
            margin-right: 15px;
            display: flex;
            align-items: center;
        }
        
        .form-group label {
            font-weight: bold;
            margin-right: 5px;
            font-size: 11px;
        }
        
        .underline {
            border-bottom: 1px solid #000;
            padding-bottom: 1px;
            min-width: 100px;
            display: inline-block;
            height: 14px;
        }
        
        .checkbox {
            width: 12px;
            height: 12px;
            border: 1px solid #000;
            display: inline-block;
            margin-right: 5px;
            text-align: center;
            vertical-align: middle;
        }
        
        .checkbox.checked {
            background-color: #000;
        }
        
        .section {
            margin-bottom: 12px;
        }
        
        .section-title {
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 12px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }
        
        table, th, td {
            border: 1px solid #000;
        }
        
        th, td {
            padding: 5px;
            text-align: left;
            font-size: 10px;
            vertical-align: top;
        }
        
        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }
        
        .long-text {
            min-height: 60px;
            border: 1px solid #000;
            padding: 8px;
            margin-top: 5px;
        }
        
        .three-column {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 15px;
        }
        
        .assistance-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .signature-section {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }
        
        .signature-box {
            text-align: center;
            width: 150px;
        }
        
        .signature-line {
            border-top: 1px solid #000;
            margin-top: 30px;
            padding-top: 5px;
            font-size: 8px;
        }
        
        .checkbox-item {
            margin-bottom: 3px;
            display: flex;
            align-items: center;
        }
        
        .checkbox-item label {
            font-weight: normal;
            margin-left: 5px;
        }
        
        .wide-underline {
            border-bottom: 1px solid #000;
            padding-bottom: 1px;
            min-width: 250px;
            display: inline-block;
            height: 14px;
        }
        
        .medium-underline {
            border-bottom: 1px solid #000;
            padding-bottom: 1px;
            min-width: 180px;
            display: inline-block;
            height: 14px;
        }
        
        .assessment-section {
            margin-top: 15px;
        }
        
        .assessment-row {
            display: flex;
            margin-bottom: 8px;
        }
        
        .assessment-col {
            flex: 1;
            margin-right: 20px;
        }
        
        .categorization-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        
        .category-col {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="case-info">
        <strong>Case No:</strong> {{ $data->id ?? '' }}<br>
        <strong>Date:</strong> {{ $data->created_at ? $data->created_at->format('m/d/Y') : '' }}
    </div>
    
    <div class="header">
        <h1>GENERAL INTAKE SHEET</h1>
        <p>Republic of the Philippines<br>
        Department of Social Welfare and Development<br>
        Social Welfare and Development Office</p>
    </div>
    
    <!-- Client Information -->
    <div class="section">
        <div class="form-row">
            <div class="form-group">
                <label>Client's Name:</label>
                <span class="wide-underline">{{ $data->client_name ?? '' }}</span>
            </div>
            <div class="form-group">
                <label>Sex:</label>
                <span class="checkbox {{ ($data->client_sex ?? '') == 'Male' ? 'checked' : '' }}"></span> M
                <span class="checkbox {{ ($data->client_sex ?? '') == 'Female' ? 'checked' : '' }}"></span> F
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label>Last Name:</label>
                <span class="medium-underline">{{ explode(' ', $data->client_name ?? '')[0] ?? '' }}</span>
            </div>
            <div class="form-group">
                <label>First Name:</label>
                <span class="medium-underline">{{ explode(' ', $data->client_name ?? '')[1] ?? '' }}</span>
            </div>
            <div class="form-group">
                <label>Middle Name:</label>
                <span class="medium-underline">{{ explode(' ', $data->client_name ?? '')[2] ?? '' }}</span>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label>Date of Birth:</label>
                <span class="underline">{{ $data->client_dob ? \Carbon\Carbon::parse($data->client_dob)->format('m/d/Y') : '' }}</span>
            </div>
            <div class="form-group">
                <label>Age:</label>
                <span class="underline">{{ $data->client_dob ? \Carbon\Carbon::parse($data->client_dob)->age : '' }}</span>
            </div>
            <div class="form-group">
                <label>Civil Status:</label>
                <span class="underline">{{ $data->civil_status ?? '' }}</span>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label>Present Address:</label>
                <span class="wide-underline">{{ $data->present_address ?? '' }}</span>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label>Nationality:</label>
                <span class="underline">{{ $data->nationality ?? '' }}</span>
            </div>
            <div class="form-group">
                <label>Religion:</label>
                <span class="underline">{{ $data->religion ?? '' }}</span>
            </div>
            <div class="form-group">
                <label>Occupation:</label>
                <span class="underline">{{ $data->occupation ?? '' }}</span>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label>Monthly Income:</label>
                <span class="underline">{{ $data->monthly_income ? '₱' . number_format($data->monthly_income, 2) : '' }}</span>
            </div>
            <div class="form-group">
                <label>Educational Attainment:</label>
                <span class="underline">{{ $data->educational_attainment ?? '' }}</span>
            </div>
        </div>
    </div>
    
    <!-- Beneficiary Information -->
    <div class="section">
        <div class="section-title">BENEFICIARY INFORMATION</div>
        <div class="form-row">
            <div class="form-group">
                <label>Beneficiary's Name:</label>
                <span class="wide-underline">{{ $data->beneficiary_name ?? '' }}</span>
            </div>
            <div class="form-group">
                <label>Sex:</label>
                <span class="checkbox {{ ($data->beneficiary_sex ?? '') == 'Male' ? 'checked' : '' }}"></span> M
                <span class="checkbox {{ ($data->beneficiary_sex ?? '') == 'Female' ? 'checked' : '' }}"></span> F
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label>Date of Birth:</label>
                <span class="underline">{{ $data->beneficiary_dob ? \Carbon\Carbon::parse($data->beneficiary_dob)->format('m/d/Y') : '' }}</span>
            </div>
            <div class="form-group">
                <label>Place of Birth:</label>
                <span class="medium-underline">{{ $data->beneficiary_birthplace ?? '' }}</span>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label>Relationship to Beneficiary:</label>
                <span class="medium-underline">{{ $data->relationship_to_beneficiary ?? '' }}</span>
            </div>
        </div>
    </div>
    
    <!-- Problem/Circumstances -->
    <div class="section">
        <div class="section-title">PROBLEM/CIRCUMSTANCES PRESENTED</div>
        <div class="long-text">
            {{ $data->problem_presented ?? '' }}
        </div>
    </div>
    
    <!-- Categorization -->
    <div class="section">
        <div class="section-title">CATEGORIZATION</div>
        <div class="categorization-grid">
            <div class="category-col">
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->is_child_in_need_special_protection ? 'checked' : '' }}"></span>
                    <label>Child in Need of Special Protection</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->is_youth_in_need ? 'checked' : '' }}"></span>
                    <label>Youth in Need of Assistance</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->is_woman_in_difficult_circumstances ? 'checked' : '' }}"></span>
                    <label>Woman in Difficult Circumstances</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->is_pwd ? 'checked' : '' }}"></span>
                    <label>Person with Disability</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->is_senior ? 'checked' : '' }}"></span>
                    <label>Senior Citizen</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->is_family_in_crisis ? 'checked' : '' }}"></span>
                    <label>Family in Crisis</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->is_others ? 'checked' : '' }}"></span>
                    <label>Others: {{ $data->others_category ?? '' }}</label>
                </div>
            </div>
            <div class="category-col">
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->needs_counseling ? 'checked' : '' }}"></span>
                    <label>Counseling</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->needs_referral ? 'checked' : '' }}"></span>
                    <label>Referral</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->needs_legal_assistance ? 'checked' : '' }}"></span>
                    <label>Legal Assistance</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->needs_other_sub_categories ? 'checked' : '' }}"></span>
                    <label>Other Sub-Categories</label>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Assistance Requested -->
    <div class="section">
        <div class="section-title">ASSISTANCE REQUESTED</div>
        
        <div class="assessment-row">
            <div class="assessment-col">
                <strong>A. Financial Assistance:</strong>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->financial_food_subsidy ? 'checked' : '' }}"></span>
                    <label>Food Subsidy</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->financial_livelihood ? 'checked' : '' }}"></span>
                    <label>Livelihood</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->financial_educational ? 'checked' : '' }}"></span>
                    <label>Educational</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->financial_medical ? 'checked' : '' }}"></span>
                    <label>Medical</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->financial_burial ? 'checked' : '' }}"></span>
                    <label>Burial</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->financial_transportation ? 'checked' : '' }}"></span>
                    <label>Transportation</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->financial_others ? 'checked' : '' }}"></span>
                    <label>Others</label>
                </div>
                <div style="margin-top: 10px;">
                    <strong>Specify:</strong> <span class="medium-underline">{{ $data->financial_assistance_specify ?? '' }}</span>
                </div>
                <div>
                    <strong>Amount:</strong> <span class="medium-underline">{{ $data->financial_assistance_amount ? '₱' . number_format($data->financial_assistance_amount, 2) : '' }}</span>
                </div>
            </div>
            
            <div class="assessment-col">
                <strong>B. Material Assistance:</strong>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->material_food_packs ? 'checked' : '' }}"></span>
                    <label>Food Packs</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->material_used_clothing ? 'checked' : '' }}"></span>
                    <label>Used Clothing</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->material_assistive_device ? 'checked' : '' }}"></span>
                    <label>Assistive Device</label>
                </div>
                <div class="checkbox-item">
                    <span class="checkbox {{ $data->material_others ? 'checked' : '' }}"></span>
                    <label>Others</label>
                </div>
                <div style="margin-top: 10px;">
                    <strong>Specify:</strong> <span class="medium-underline">{{ $data->material_assistance_specify ?? '' }}</span>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Assessment Table -->
    <div class="section">
        <div class="section-title">ASSESSMENT</div>
        <table>
            <thead>
                <tr>
                    <th>Assessment Areas</th>
                    <th>Situation</th>
                    <th>Functioning</th>
                    <th>Problems Encountered</th>
                    <th>Recommendations</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Individual/Personal</td>
                    <td>{{ $data->individual_situation ?? '' }}</td>
                    <td>{{ $data->individual_functioning ?? '' }}</td>
                    <td>{{ $data->individual_problems ?? '' }}</td>
                    <td>{{ $data->individual_recommendations ?? '' }}</td>
                </tr>
                <tr>
                    <td>Family</td>
                    <td>{{ $data->family_situation ?? '' }}</td>
                    <td>{{ $data->family_functioning ?? '' }}</td>
                    <td>{{ $data->family_problems ?? '' }}</td>
                    <td>{{ $data->family_recommendations ?? '' }}</td>
                </tr>
                <tr>
                    <td>Community</td>
                    <td>{{ $data->community_situation ?? '' }}</td>
                    <td>{{ $data->community_functioning ?? '' }}</td>
                    <td>{{ $data->community_problems ?? '' }}</td>
                    <td>{{ $data->community_recommendations ?? '' }}</td>
                </tr>
                <tr>
                    <td>Institutional</td>
                    <td>{{ $data->institutional_situation ?? '' }}</td>
                    <td>{{ $data->institutional_functioning ?? '' }}</td>
                    <td>{{ $data->institutional_problems ?? '' }}</td>
                    <td>{{ $data->institutional_recommendations ?? '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Social Worker Assessment -->
    <div class="section">
        <div class="section-title">SOCIAL WORKER ASSESSMENT/RECOMMENDATION</div>
        <div class="long-text">
            {{ $data->social_worker_assessment ?? '' }}
        </div>
    </div>
    
    <!-- Signatures -->
    <div class="signature-section">
        <div class="signature-box">
            <div class="signature-line">
                Client's Signature
            </div>
        </div>
        <div class="signature-box">
            <div class="signature-line">
                Date
            </div>
        </div>
        <div class="signature-box">
            <div class="signature-line">
                Social Worker's Signature
            </div>
        </div>
    </div>
</body>
</html>