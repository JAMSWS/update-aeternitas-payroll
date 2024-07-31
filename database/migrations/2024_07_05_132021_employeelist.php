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
            $table->string('suffix')->nullable();
            $table->string('department_name');
            $table->string('position_name');
            $table->string('phone_number')->nullable();
            $table->string('email_address')->nullable();
            $table->mediumText('current_address')->nullable();
            $table->string('sex')->nullable();
            $table->integer('age')->nullable();
            $table->string('pay_type')->nullable();
            $table->decimal('per_day',10, 2)->nullable();
            $table->decimal('basic_pay', 10, 2);
            $table->decimal('allowance', 10, 2);
            $table->decimal('per_bi_month', 10, 2)->nullable();
            $table->decimal('per_month', 10, 2)->nullable();
            $table->integer('actual_days_worked')->nullable();
            $table->decimal('absences',10, 2)->nullable();
            $table->decimal('vlsl',10, 2)->nullable();
            $table->decimal('regular_worked_days',10, 2)->nullable();
            $table->decimal('rwd_amount',10, 2)->nullable();
            $table->decimal('legal_worked_days',10, 2)->nullable();
            $table->decimal('lhd_amount',10, 2)->nullable();
            $table->decimal('leave_amount',10, 2)->nullable();
            $table->decimal('special_rate',10, 2)->nullable();
            $table->decimal('special_worked_days',10, 2)->nullable();
            $table->decimal('special_amount',10, 2)->nullable();
            $table->decimal('total_basic_pay',10, 2)->nullable();
            $table->decimal('overtime_rate25',10, 2)->nullable();
            $table->decimal('ot_hours25',10, 2)->nullable();
            $table->decimal('ot_amount25',10, 2)->nullable();
            $table->decimal('overtime_rate30',10, 2)->nullable();
            $table->decimal('ot_hours30',10, 2)->nullable();
            $table->decimal('ot_amount30',10, 2)->nullable();
            $table->decimal('overtime_rate100',10, 2)->nullable();
            $table->decimal('ot_hours100',10, 2)->nullable();
            $table->decimal('ot_amount100',10, 2)->nullable();
            $table->decimal('total_ot',10, 2)->nullable();
            $table->decimal('total_basic_pay_plus_ot',10, 2)->nullable();
            $table->decimal('nd_rate',10, 2)->nullable();
            $table->decimal('nd_hours',10, 2)->nullable();
            $table->decimal('nd_amount',10, 2)->nullable();

            $table->decimal('late_rate',10, 2)->nullable();
            $table->decimal('number_of_minutes_late',10, 2)->nullable();
            $table->decimal('late_amount',10, 2)->nullable();
            $table->decimal('missing_charges',10, 2)->nullable();
            $table->decimal('total_charges',10, 2)->nullable();

            $table->decimal('half_allowance',10, 2)->nullable();
            $table->decimal('meal_allowance',10, 2)->nullable();

            $table->decimal('grosspay',10, 2)->nullable();

            $table->decimal('sss_premcontribution',10, 2)->nullable();
            $table->decimal('sss_wisp',10, 2)->nullable();
            $table->decimal('phic',10, 2)->nullable();
            $table->decimal('hdmf',10, 2)->nullable();
            $table->decimal('tax',10, 2)->nullable();
            $table->decimal('sss_loan',10, 2)->nullable();
            $table->decimal('hdmf_loan',10, 2)->nullable();
            $table->decimal('uniform',10, 2)->nullable();

            $table->decimal('employer_sss_premcontribution',10, 2)->nullable();
            $table->decimal('employer_sss_wisp',10, 2)->nullable();
            $table->decimal('employer_phic',10, 2)->nullable();
            $table->decimal('employer_hdmf',10, 2)->nullable();

            $table->decimal('tax_sss_premcontribution',10, 2)->nullable();
            $table->decimal('tax_sss_wisp',10, 2)->nullable();
            $table->decimal('tax_phic',10, 2)->nullable();
            $table->decimal('tax_hdmf',10, 2)->nullable();
            $table->decimal('totalremittance',10, 2)->nullable();
            $table->decimal('taxable_income',10, 2)->nullable();
            $table->decimal('tax_cl',10, 2)->nullable();
            $table->decimal('tax_excess',10, 2)->nullable();

            $table->decimal('tax_rate_percentage',10, 2)->nullable();
            $table->decimal('tax_rate',10, 2)->nullable();
            $table->decimal('fixed_rate',10, 2)->nullable();
            $table->decimal('tax_month',10, 2)->nullable();
            $table->decimal('tax_cutoff',10, 2)->nullable();






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
