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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_id')->constrained('complaints')->onDelete('cascade');
            $table->string('transaction_type')->nullable();
            $table->string('other_type')->nullable();
            $table->boolean('was_sent')->nullable();
            $table->decimal('amount', 15, 2)->nullable();
            $table->date('date')->nullable();
            $table->boolean('institution_notified')->nullable();
            $table->string('victim_bank_name')->nullable();
            $table->string('victim_bank_address1')->nullable();
            $table->string('victim_bank_address2')->nullable();
            $table->string('victim_bank_mail_stop')->nullable();
            $table->string('victim_bank_city')->nullable();
            $table->string('victim_bank_country')->nullable();
            $table->string('victim_bank_state')->nullable();
            $table->string('victim_bank_zipcode')->nullable();
            $table->string('victim_account_name')->nullable();
            $table->string('victim_account_number')->nullable();
            $table->string('cryptocurrency_type')->nullable();
            $table->string('p2p_application')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('crypto_atm')->nullable();
            $table->string('gift_card_type')->nullable();
            $table->string('atm_address')->nullable();
            $table->string('atm_city')->nullable();
            $table->string('atm_country')->nullable();
            $table->string('atm_state')->nullable();
            $table->string('atm_zipcode')->nullable();
            $table->string('victim_account_wallet')->nullable();
            $table->string('victim_account_identifier')->nullable();
            $table->string('gift_card_number')->nullable();
            $table->string('recipient_bank_name')->nullable();
            $table->string('recipient_bank_address1')->nullable();
            $table->string('recipient_bank_address2')->nullable();
            $table->string('recipient_bank_mail_stop')->nullable();
            $table->string('recipient_bank_city')->nullable();
            $table->string('recipient_bank_country')->nullable();
            $table->string('recipient_bank_state')->nullable();
            $table->string('recipient_bank_zipcode')->nullable();
            $table->string('recipient_account_name')->nullable();
            $table->string('recipient_name')->nullable();
            $table->string('recipient_bank_routing_number')->nullable();
            $table->string('recipient_account_number')->nullable();
            $table->string('recipient_bank_swift_code')->nullable();
            $table->string('recipient_account_wallet')->nullable();
            $table->string('recipient_account_identifier')->nullable();
            $table->string('recipient_identifier')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
