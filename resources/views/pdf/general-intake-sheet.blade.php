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
            margin: 20px;
            padding: 0;
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
        .checkbox {
            width: 12px;
            height: 12px;
            border: 1px solid #000;
            display: inline-block;
            text-align: center;
            vertical-align: middle;
            margin-right: 5px;
        }
        .underline {
            border-bottom: 1px solid #000;
            padding-bottom: 1px;
            min-width: 100px;
            display: inline-block;
            height: 14px;
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
        .signature-section {
            margin-top: 20px;
        }
        .signature-box {
            text-align: center;
            width: 150px;
            display: inline-block;
        }
        .signature-line {
            border-top: 1px solid #000;
            margin-top: 30px;
            padding-top: 5px;
            font-size: 8px;
        }
        .checkbox-item {
            margin-bottom: 3px;
        }
    </style>
</head>
<body>
    <div style="position: relative;">
        <div class="case-info">
            <strong>Case No:</strong> {{ $data->id ?? '' }}<br>
            <strong>Date:</strong> {{ $data->created_at ? $data->created_at->format('m/d/Y') : '' }}
        </div>
    </div>

    <div class="header">
        <h1>GENERAL INTAKE SHEET</h1>
        <p>Republic of the Philippines<br>
        Province of Surigao del Norte<br>
        Municipal Social Welfare and Development Office</p>
    </div>

    <!-- I. Client's Identifying Information -->
    <div class="section">
        <div class="section-title">I. CLIENT'S IDENTIFYING INFORMATION</div>
        <div style="margin-bottom: 8px;">
            <strong>Client's Name:</strong> <span class="wide-underline">{{ $data->client_name ?? '' }}</span>
            <strong style="margin-left: 15px;">Sex:</strong>
            <span class="checkbox">{{ $data->client_sex == 'Male' ? 'X' : '' }}</span> M
            <span class="checkbox">{{ $data->client_sex == 'Female' ? 'X' : '' }}</span> F
        </div>
        <div style="margin-bottom: 8px;">
            <strong>Date of Birth:</strong> <span class="underline">{{ $data->client_dob ? \Carbon\Carbon::parse($data->client_dob)->format('Y/m/d') : '' }}</span>
            <strong style="margin-left: 15px;">Present Address:</strong> <span class="wide-underline">{{ $data->present_address ?? '' }}</span>
        </div>
        <div style="margin-bottom: 8px;">
            <strong>Relationship to Beneficiary:</strong> <span class="medium-underline">{{ $data->relationship_to_beneficiary ?? '' }}</span>
            <strong style="margin-left: 15px;">Civil Status:</strong>
            <span class="checkbox">{{ $data->civil_status == 'Single' ? 'X' : '' }}</span> Single
            <span class="checkbox">{{ $data->civil_status == 'Married' ? 'X' : '' }}</span> Married
            <span class="checkbox">{{ !in_array($data->civil_status ?? '', ['Single', 'Married']) ? 'X' : '' }}</span> Other: <span class="underline">{{ $data->civil_status ?? '' }}</span>
        </div>
        <div style="margin-bottom: 8px;">
            <strong>Religion:</strong> <span class="underline">{{ $data->religion ?? '' }}</span>
            <strong style="margin-left: 15px;">Nationality:</strong> <span class="underline">{{ $data->nationality ?? '' }}</span>
            <strong style="margin-left: 15px;">Highest Educational Attainment:</strong> <span class="underline">{{ $data->educational_attainment ?? '' }}</span>
        </div>
        <div style="margin-bottom: 8px;">
            <strong>Skills/Occupation:</strong> <span class="underline">{{ $data->occupation ?? '' }}</span>
            <strong style="margin-left: 15px;">Estimated Monthly Income:</strong> <span class="underline">{{ $data->monthly_income ? 'PHP' . number_format($data->monthly_income, 2) : '' }}</span>
            <strong style="margin-left: 15px;">PhilHealth No.:</strong> <span class="underline">{{ $data->philhealth_no ?? '' }}</span>
        </div>
        <div style="margin-bottom: 8px;">
            <strong>Mode of Admission:</strong>
            <span class="checkbox">{{ $data->mode_of_admission == 'Walk-in' ? 'X' : '' }}</span> Walk-in
            <span class="checkbox">{{ $data->mode_of_admission == 'Referral' ? 'X' : '' }}</span> Referral
            <strong style="margin-left: 15px;">Referring Party:</strong> <span class="medium-underline">{{ $data->referring_party ?? '' }}</span>
        </div>
        <div style="margin-bottom: 8px;">
            <strong>Contact w/ Address:</strong> <span class="wide-underline">{{ $data->contact_with_address ?? '' }}</span>
        </div>
    </div>

    <!-- II. Beneficiary's Identifying Information -->
    <div class="section">
        <div class="section-title">II. BENEFICIARY'S IDENTIFYING INFORMATION</div>
        <div style="margin-bottom: 8px;">
            <strong>Beneficiary's Name:</strong> <span class="wide-underline">{{ $data->beneficiary_name ?? '' }}</span>
            <strong style="margin-left: 15px;">Sex:</strong>
            <span class="checkbox">{{ $data->beneficiary_sex == 'Male' ? 'X' : '' }}</span> M
            <span class="checkbox">{{ $data->beneficiary_sex == 'Female' ? 'X' : '' }}</span> F
        </div>
        <div style="margin-bottom: 8px;">
            <strong>Date of Birth:</strong> <span class="underline">{{ $data->beneficiary_dob ? \Carbon\Carbon::parse($data->beneficiary_dob)->format('Y/m/d') : '' }}</span>
            <strong style="margin-left: 15px;">Place of Birth:</strong> <span class="medium-underline">{{ $data->beneficiary_birthplace ?? '' }}</span>
        </div>
    </div>

    <!-- III. Beneficiary's Family Composition -->
    <div class="section">
        <div class="section-title">III. BENEFICIARY'S FAMILY COMPOSITION (use additional sheet if necessary)</div>
        <table>
            <thead>
                <tr>
                    <th style="width: 10%;">Last Name</th>
                    <th style="width: 10%;">First Name</th>
                    <th style="width: 10%;">Middle Name</th>
                    <th style="width: 5%;">Sex</th>
                    <th style="width: 10%;">Birthdate</th>
                    <th style="width: 10%;">Civil Status</th>
                    <th style="width: 10%;">Relationship</th>
                    <th style="width: 15%;">Highest Educational Attainment</th>
                    <th style="width: 15%;">Skills/Occupation</th>
                    <th style="width: 15%;">Est. Monthly Income</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->family_last_name ?? '' }}</td>
                    <td>{{ $data->family_first_name ?? '' }}</td>
                    <td>{{ $data->family_middle_name ?? '' }}</td>
                    <td>{{ $data->family_sex ?? '' }}</td>
                    <td>{{ $data->family_birthdate ?? '' }}</td>
                    <td>{{ $data->family_civil_status ?? '' }}</td>
                    <td>{{ $data->family_relationship ?? '' }}</td>
                    <td>{{ $data->family_education ?? '' }}</td>
                    <td>{{ $data->family_occupation ?? '' }}</td>
                    <td>{{ $data->family_income ?? '' }}</td>
                </tr>
                <!-- Add more rows if data exists -->
            </tbody>
        </table>
    </div>

    <!-- IV. Assessment -->
    <div class="section">
        <div class="section-title">IV. ASSESSMENT (use additional sheet if necessary)</div>
        <div><strong>Problem Presented:</strong></div>
        <div class="long-text">{{ $data->problem_presented ?? '' }}</div>
        <div style="margin-top: 8px;"><strong>Social Worker's Assessment:</strong></div>
        <div class="long-text">{{ $data->social_worker_assessment ?? '' }}</div>
        <table style="margin-top: 8px;">
            <tr>
                <td style="width: 50%;">
                    <strong>Client Category (check only one):</strong>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->is_child_in_need_special_protection ? 'X' : '' }}</span> Children in Need of Special Protection
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->is_youth_in_need ? 'X' : '' }}</span> Youth in Need of Special Protection
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->is_woman_in_difficult_circumstances ? 'X' : '' }}</span> Women in Especially Difficult Circumstances
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->is_pwd ? 'X' : '' }}</span> Person with Disability
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->is_senior ? 'X' : '' }}</span> Senior Citizen
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->is_family_in_crisis ? 'X' : '' }}</span> Family Head and Other Needy Adult
                    </div>
                </td>
                <td style="width: 50%;">
                    <strong>Client Sub-Category:</strong>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->needs_counseling ? 'X' : '' }}</span> Counseling
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->needs_referral ? 'X' : '' }}</span> Referral <span class="underline">{{ $data->referral_specify ?? '' }}</span>
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->needs_legal_assistance ? 'X' : '' }}</span> Legal Assistance
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- V. Recommended Services and Assistance -->
    <div class="section">
        <div class="section-title">V. RECOMMENDED SERVICES AND ASSISTANCE</div>
        <table>
            <tr>
                <td style="width: 50%;">
                    <strong>Nature of Service/Assistance:</strong>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->needs_counseling ? 'X' : '' }}</span> Counseling
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->needs_legal_assistance ? 'X' : '' }}</span> Legal Assistance (Retainer Lawyer/Others)
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->needs_referral ? 'X' : '' }}</span> Referral <span class="underline">{{ $data->referral_specify ?? '' }}</span>
                    </div>
                    <div class="checkbox-item">
                        <strong>Financial Assistance:</strong>
                        <div style="margin-left: 15px;">
                            <div class="checkbox-item">
                                <span class="checkbox">{{ $data->financial_food_subsidy ? 'X' : '' }}</span> Food Subsidy
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox">{{ $data->financial_livelihood ? 'X' : '' }}</span> Livelihood
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox">{{ $data->financial_educational ? 'X' : '' }}</span> Educational
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox">{{ $data->financial_medical ? 'X' : '' }}</span> Medical
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox">{{ $data->financial_burial ? 'X' : '' }}</span> Burial
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox">{{ $data->financial_transportation ? 'X' : '' }}</span> Transportation
                            </div>
                            <div class="checkbox-item">
                                <span class="checkbox">{{ $data->financial_others ? 'X' : '' }}</span> Others <span class="underline">{{ $data->financial_assistance_specify ?? '' }}</span>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 8px;">
                        <strong>Amount of Financial Assistance:</strong> <span class="underline">{{ $data->financial_assistance_amount ? 'P' . number_format($data->financial_assistance_amount, 2) : '' }}</span>
                    </div>
                    <div style="margin-top: 8px;">
                        <strong>Mode of Financial Assistance:</strong>
                        <span class="checkbox">{{ $data->mode_of_financial_assistance == 'Cash' ? 'X' : '' }}</span> Cash
                        <span class="checkbox">{{ $data->mode_of_financial_assistance == 'Check' ? 'X' : '' }}</span> Check
                        <span class="checkbox">{{ $data->mode_of_financial_assistance == 'Guarantee Letter' ? 'X' : '' }}</span> Guarantee Letter
                    </div>
                    <div style="margin-top: 8px;">
                        <strong>Source of Assistance:</strong>
                        <span class="checkbox">{{ $data->source_of_assistance == 'Regular Funds' ? 'X' : '' }}</span> Regular Funds
                        <span class="checkbox">{{ $data->source_of_assistance == 'Donation' ? 'X' : '' }}</span> Donation
                        <span class="checkbox">{{ $data->source_of_assistance == 'Legislator' ? 'X' : '' }}</span> Legislator
                        <span class="checkbox">{{ !in_array($data->source_of_assistance ?? '', ['Regular Funds', 'Donation', 'Legislator']) ? 'X' : '' }}</span> Other <span class="underline">{{ $data->source_of_assistance ?? '' }}</span>
                    </div>
                    <div style="margin-top: 8px;">
                        <strong>Sub-total:</strong> <span class="underline">{{ $data->sub_total ? 'P' . number_format($data->sub_total, 2) : '' }}</span>
                    </div>
                </td>
                <td style="width: 50%;">
                    <strong>Material Assistance:</strong>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->material_food_packs ? 'X' : '' }}</span> Food Pack
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->material_used_clothing ? 'X' : '' }}</span> Used Clothing
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->material_hot_meal ? 'X' : '' }}</span> Hot Meal
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->material_assistive_device ? 'X' : '' }}</span> Assistive Device
                    </div>
                    <div class="checkbox-item">
                        <span class="checkbox">{{ $data->material_others ? 'X' : '' }}</span> Others <span class="underline">{{ $data->material_assistance_specify ?? '' }}</span>
                    </div>
                    <div style="margin-top: 8px;">
                        <strong>Total:</strong> <span class="underline">{{ $data->total ? 'P' . number_format($data->total, 2) : '' }}</span>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Footer Section -->
    <div class="signature-section">
        <div style="float: left; width: 50%;">
            <div class="signature-box">
                <div class="signature-line">Client Signature/Thumb Mark</div>
            </div>
        </div>
        <div style="float: right; width: 50%;">
            <div class="signature-box">
                <div class="signature-line">Interviewed by: {{ $data->social_worker_name ?? 'MARC STEPHEN S. DAO, RSW' }}</div>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
</body>
</html>