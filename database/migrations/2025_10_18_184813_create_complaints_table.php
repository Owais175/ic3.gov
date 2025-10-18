<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            // Step 1
            $table->boolean('is_victim');
            $table->string('complainant_name', 50);
            $table->string('complainant_business_name', 50)->nullable();
            $table->string('complainant_phone', 50);
            $table->string('complainant_email', 50);

            // Step 2
            $table->string('victim_name', 50);
            $table->string('victim_age_range')->nullable();
            $table->boolean('victim_is_minor')->nullable();
            $table->string('victim_address1', 50);
            $table->string('victim_address2', 50)->nullable();
            $table->string('victim_suite', 50)->nullable();
            $table->string('victim_city', 50);
            $table->string('victim_county', 50)->nullable();
            $table->string('victim_country');
            $table->string('victim_state')->nullable();
            $table->string('victim_zip_code', 20);
            $table->string('victim_phone', 50);
            $table->string('victim_email', 50);

            // Business info
            $table->boolean('victim_is_business')->nullable();
            $table->string('victim_business_name', 50)->nullable();
            $table->boolean('victim_business_impacted')->nullable();
            $table->string('victim_it_poc', 150)->nullable();
            $table->string('victim_other_poc', 150)->nullable();
            $table->string('victim_sector')->nullable();
            $table->string('victim_subsector')->nullable();

            // Step 3
            $table->boolean('money_sent');
            $table->decimal('reported_loss', 12, 2)->nullable();

            // Step 5
            $table->text('incident_description');

            // Step 6
            $table->text('email_headers')->nullable();
            $table->text('witnesses')->nullable();
            $table->text('law_enforcement')->nullable();
            $table->boolean('complaint_update')->nullable();

            // Step 7
            $table->string('digital_signature', 50);

            // Metadata
            $table->string('complaint_number')->unique();
            $table->string('status')->default('submitted');
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_id')->constrained()->onDelete('cascade');
            $table->string('transaction_type');
            $table->string('other_type', 50)->nullable();
            $table->boolean('was_sent')->nullable();
            $table->decimal('amount', 12, 2)->nullable();
            $table->date('date')->nullable();
            $table->boolean('institution_notified')->nullable();
            $table->string('victim_bank_name', 50)->nullable();
            $table->string('victim_account_number', 50)->nullable();
            $table->string('recipient_bank_name', 50)->nullable();
            $table->string('recipient_account_number', 50)->nullable();
            $table->timestamps();
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_id')->constrained()->onDelete('cascade');
            $table->string('name', 50)->nullable();
            $table->string('business_name', 50)->nullable();
            $table->string('address1', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('zip_code', 20)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('ip_address', 39)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('complaints');
    }
};
