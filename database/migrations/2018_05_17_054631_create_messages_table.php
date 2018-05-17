<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Message;

/**
 * Class CreateMessagesTable
 *
 * Создание таблицы сообщений - messages
 */
class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Message())->getTable(), function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')
                ->length(10)
                ->unsigned();
            $table->text('message');
            $table->timestamps();

            // Устанавливаем связь по полю user_id к таблице пользователи
            $table->foreign('user_id')
                ->references('id')
                ->on((new User())->getTable())
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
