<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('alternate_phone')->nullable();
            $table->bigInteger('file_id')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('pincode')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->tinyInteger('is_active')->default(false);
            
            $table->enum('role', ['admin', 'center', 'student'])->default('student');


            $table->string('partners')->nullable();

            $table->string('parent_id')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->enum('gender', ['Male', 'Female'])->default('Male');
            $table->date('date_of_birth')->nullable();
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])->nullable();
            $table->string('religion')->nullable();
            $table->enum('proof_type', ['Aadhar Card', 'Voter card', 'Ration Card', 'PAN Card', 'License No', 'Passport'])->nullable();
            $table->string('proof_identification')->nullable();
            $table->enum('caste_category', ['General', 'OBC', 'SC', 'ST', 'NT', 'Minority', 'VJNT', 'Others'])->nullable();
            $table->string('bpl_card')->nullable();
            $table->string('residence')->nullable();
            $table->enum('residence_type', ['Pakka Ghar', 'Kacha Ghar'])->nullable();
            $table->enum('physical_disability', ['Yes', 'No'])->default('No');
            $table->enum('martial_status', ['Single', 'Married', 'Divorced/Seperated', 'Widow'])->default('Single');
            $table->string('bank_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('bank_location')->nullable();
            $table->string('bank_ifsc')->nullable();
            $table->longText('scan_thumb')->nullable();
            $table->string('education')->nullable();


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
