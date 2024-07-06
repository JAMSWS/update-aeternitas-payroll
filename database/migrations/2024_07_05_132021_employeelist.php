<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('custom_id')->unique();
            $table->string('employee_name')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('suffix');
            $table->string('department_name');
            $table->string('position_name');
            $table->integer('phone_number')->nullable();
            $table->string('email_address')->nullable();
            $table->mediumText('current_address')->nullable();
            $table->string('pay_type')->nullable();
            $table->integer('per_day')->nullable();
            $table->integer('basic_pay');
            $table->integer('per_month')->nullable();
            $table->integer('sss_number')->nullable();
            $table->integer('philhealth_number')->nullable();
            $table->integer('pagibig_number')->nullable();
            $table->integer('tin_number')->nullable();
            $table->integer('monthly_compensation')->nullable();
            $table->integer('number_dependents')->nullable();
            $table->string('name_dependents')->nullable();

            // case of emergency
            $table->string('emergency_name')->nullable();
            $table->integer('emergency_phonenumber')->nullable();
            $table->string('emergency_relationship')->nullable();
            $table->mediumText('emergency_address')->nullable();

            //seperation
            $table->timestamp('seperation_date')->useCurrent()->nullable();
            $table->mediumText('seperation_reason')->nullable();
            $table->mediumText('seperation_remarks')->nullable();



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('employee');
    }
};
