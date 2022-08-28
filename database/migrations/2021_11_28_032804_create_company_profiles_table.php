<?php

use App\Models\CompanyProfile;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('company_name',100);
            $table->string('phone_1',11);
            $table->string('phone_2',11)->nullable();
            $table->string('email',100)->nullable();
            $table->string('logo')->nullable();
            $table->text('address');
            //About Us
            $table->text('about_description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('about_image')->nullable();
            //Social Link
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('updated_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        $user = new CompanyProfile();
        $user->company_name = "Link Up Technology";
        $user->phone_1 = "phone_1";
        $user->phone_2 = "phone_2";
        $user->email = "aztibd@gmail.com";
        $user->address = "address";
        $user->short_description = "about description";
        $user->about_description = "about description";

        $user->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_profiles');
    }
}
