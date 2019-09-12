<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIcreditsimulatorClientCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icreditsimulator__clientcredits', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('credit_reason');
            $table->string('personal_reference_full_name');
            $table->string('personal_reference_city');
            $table->string('personal_reference_residence_phone');
            $table->string('personal_reference_phone');
            $table->float('capital', 30, 2)->default(0);
            $table->integer('term_days')->default(1);
            $table->float('interest_rate', 30, 2)->default(0);
            $table->float('warranty', 30, 2)->default(0);
            $table->float('total_interest', 30, 2)->default(0);
            $table->float('cost_use_plataform', 30, 2)->default(0);
            $table->float('iva', 30, 2)->default(0);
            $table->float('total_to_pay', 30, 2)->default(0);

            $table->smallInteger('financial_entity');
            $table->string('company_work');
            $table->string('account_number');
            $table->float('total_monthly_income', 30, 2)->default(0);
            $table->float('total_monthly_expenses', 30, 2)->default(0);
            $table->smallInteger('job_type');
            $table->smallInteger('seniority_employee');
            $table->smallInteger('type_antiquity');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on(config('auth.table', 'users'))->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('icreditsimulator__clientcredits');
    }
}
