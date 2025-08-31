<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('general_intake_sheets', function (Blueprint $table) {
            $table->id();

            $table->string('phone', 20)->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Client Information
            $table->string('client_name');
            $table->enum('client_sex', ['Male', 'Female', 'Other']);
            $table->date('client_dob');
            $table->string('present_address');
            $table->string('relationship_to_beneficiary')->nullable();
            $table->enum('civil_status', ['Single', 'Married', 'Widowed', 'Separated', 'Divorced']);
            $table->string('nationality');
            $table->string('occupation')->nullable();
            $table->decimal('monthly_income', 10, 2)->nullable();
            $table->string('religion')->nullable();
            // Beneficiary Information
            $table->string('beneficiary_name');
            $table->string('beneficiary_birthplace');
            $table->date('beneficiary_dob');
            $table->enum('beneficiary_sex', ['Male', 'Female', 'Other']);
            // Beneficiary Family Composition (up to 5 members)
            $table->string('fam1_fullname')->nullable();
            $table->enum('fam1_sex', ['Male', 'Female', 'Other'])->nullable();
            $table->date('fam1_birthdate')->nullable();
            $table->enum('fam1_status', ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'])->nullable();
            $table->string('fam1_occupation')->nullable();
            $table->string('fam2_fullname')->nullable();
            $table->enum('fam2_sex', ['Male', 'Female', 'Other'])->nullable();
            $table->date('fam2_birthdate')->nullable();
            $table->enum('fam2_status', ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'])->nullable();
            $table->string('fam2_occupation')->nullable();
            $table->string('fam3_fullname')->nullable();
            $table->enum('fam3_sex', ['Male', 'Female', 'Other'])->nullable();
            $table->date('fam3_birthdate')->nullable();
            $table->enum('fam3_status', ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'])->nullable();
            $table->string('fam3_occupation')->nullable();
            $table->string('fam4_fullname')->nullable();
            $table->enum('fam4_sex', ['Male', 'Female', 'Other'])->nullable();
            $table->date('fam4_birthdate')->nullable();
            $table->enum('fam4_status', ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'])->nullable();
            $table->string('fam4_occupation')->nullable();
            $table->string('fam5_fullname')->nullable();
            $table->enum('fam5_sex', ['Male', 'Female', 'Other'])->nullable();
            $table->date('fam5_birthdate')->nullable();
            $table->enum('fam5_status', ['Single', 'Married', 'Widowed', 'Separated', 'Divorced'])->nullable();
            $table->string('fam5_occupation')->nullable();
            // Assessment
            $table->text('problem_presented');
            $table->text('social_worker_assistance')->nullable();
            // Client Categories (boolean flags)
            $table->boolean('is_child_in_need')->default(false);
            $table->boolean('is_youth_in_need')->default(false);
            $table->boolean('is_woman_in_difficult_circumstances')->default(false);
            $table->boolean('is_pwd')->default(false);
            $table->boolean('is_senior')->default(false);
            // Recommended Services
            $table->boolean('needs_counseling')->default(false);
            $table->boolean('needs_legal_assistance')->default(false);
            $table->string('referral')->nullable();
            // Financial Assistance
            $table->boolean('financial_food_subsidy')->default(false);
            $table->boolean('financial_livelihood')->default(false);
            $table->boolean('financial_educational')->default(false);
            $table->boolean('financial_medical')->default(false);
            $table->boolean('financial_burial')->default(false);
            $table->boolean('financial_transportation')->default(false);
            $table->string('financial_assistance_mode')->nullable();
            $table->string('financial_assistance_source')->nullable();
            // Material Assistance
            $table->boolean('material_food_packs')->default(false);
            $table->boolean('material_used_clothing')->default(false);
            $table->boolean('material_assistive_device')->default(false);
            $table->string('material_others')->nullable();
            // Signatures
            $table->string('client_signature')->nullable(); // Store as text or file path if uploaded
            $table->string('thumb_mark')->nullable(); // Store as text or file path if uploaded
            $table->enum('status', ['PENDING', 'IN_PROGRESS', 'VERIFIED','COMPLETED','REJECTED'])->default('PENDING');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('general_intake_sheets');
    }
};