<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('username')->nullable()->after('user_id');
            $table->string('email')->nullable()->after('username');
            $table->enum('gender', ['male', 'female'])->nullable()->after('phone');
            $table->date('date_of_birth')->nullable()->after('gender');
            $table->text('biography')->nullable()->after('date_of_birth');

            $table->string('clinic_name')->nullable()->after('biography');
            $table->string('clinic_address')->nullable()->after('clinic_name');

            $table->string('address_line_1')->nullable()->after('clinic_address');
            $table->string('address_line_2')->nullable()->after('address_line_1');
            $table->string('city')->nullable()->after('address_line_2');
            $table->string('state')->nullable()->after('city');
            $table->string('country')->nullable()->after('state');
            $table->string('postal_code')->nullable()->after('country');
        });
    }

    public function down(): void
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'email',
                'gender',
                'date_of_birth',
                'biography',
                'clinic_name',
                'clinic_address',
                'address_line_1',
                'address_line_2',
                'city',
                'state',
                'country',
                'postal_code',
            ]);
        });
    }
};