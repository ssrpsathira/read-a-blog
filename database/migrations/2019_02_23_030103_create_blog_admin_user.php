<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogAdminUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = new DateTime();

        DB::table('users')->insert(
            array(
                'name' => 'Sathira',
                'email' => 'ssrpsathira@gmail.com',
                'email_verified_at' => $now->format('Y-m-d H:i:s'),
                'password' => '$2y$10$R9RMEQ5G/n8xQ0ZdZckbx.EHWhrlIheo0YC5yvyUMUkjPLBfg4kDG',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
