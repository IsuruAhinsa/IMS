<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('site_name', 100)->default("IMS");
            $table->string('logo')->nullable()->default(null);
            $table->char('favicon')->nullable()->default(null);
            $table->char('email_logo')->nullable()->default(null);
            $table->string('navbar_color')->nullable()->default('navbar-white');
            $table->string('sidebar_color')->nullable()->default('sidebar-dark');
            $table->string('skin')->nullable()->default('primary');
            $table->string('locale',5)->nullable()->default(config('app.locale'));
            $table->string('date_format')->default('Y-m-d');
            $table->string('time_format')->default('h:i A');
            $table->text('footer_text')->nullable()->default(null);
            $table->string('currency', 10)->nullable()->default('$');
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
        Schema::dropIfExists('settings');
    }
}
