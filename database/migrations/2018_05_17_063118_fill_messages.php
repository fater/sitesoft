<?php

use Illuminate\Database\Migrations\Migration;
use App\Message;
use App\User;
use Faker\Factory as Faker;

/**
 * Class FillMessages
 *
 * Регистрация 10 пользователей и добавление сообщений для них
 */
class FillMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $faker = Faker::create('ru_RU');

        for ($i = 0; $i < 10; $i ++) {
            $newUser = new User();
            $newUser->email = $faker->email;
            $newUser->name = $faker->userName;
            $newUser->password = bcrypt($faker->password(8));
            $newUser->save();

            $newMessage = new Message();
            $newMessage->message = $faker->text(500);
            $newMessage->user_id = $newUser->id;
            $newMessage->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
