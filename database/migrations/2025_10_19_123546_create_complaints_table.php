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
            $table->boolean('is_victim')->default(false);
            $table->string('complainant_name')->nullable();
            $table->string('complainant_business_name')->nullable();
            $table->string('complainant_phone')->nullable();
            $table->string('complainant_email')->nullable();
            $table->string('victim_name')->nullable();
            $table->string('victim_age_range')->nullable();
            $table->boolean('victim_is_minor')->default(false);
            $table->string('victim_address1')->nullable();
            $table->string('victim_address2')->nullable();
            $table->string('victim_suite')->nullable();
            $table->string('victim_city')->nullable();
            $table->string('victim_county')->nullable();
            $table->string('victim_country')->nullable();
            $table->string('victim_state')->nullable();
            $table->string('victim_zipcode')->nullable();
            $table->string('victim_phone')->nullable();
            $table->string('victim_email')->nullable();
            $table->boolean('victim_is_business')->default(false);
            $table->string('victim_business_name')->nullable();
            $table->text('victim_business_impacted')->nullable();
            $table->string('victim_it_poc')->nullable();
            $table->string('victim_other_poc')->nullable();
            $table->string('victim_sector')->nullable();
            $table->string('victim_subsector')->nullable();
            $table->boolean('money_sent')->default(false);
            $table->decimal('reported_loss', 15, 2)->nullable();
            $table->text('incident_description')->nullable();
            $table->text('email_headers')->nullable();
            $table->text('witnesses')->nullable();
            $table->text('law_enforcement')->nullable();
            $table->text('complaint_update')->nullable();
            $table->string('digital_signature')->nullable();
            $table->string('complaint_session')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
