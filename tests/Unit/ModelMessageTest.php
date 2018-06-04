<?php

namespace Tests\Unit;

use App\User;
use App\Message;
use Tests\TestCase;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelMessageTest extends TestCase
{
    use databaseTransactions;

    // Экземпляр модели User
    private $userObject;

    // Экземпляр модели Messages
    private $messageObject;

    private $message;

    /**
     * Set Up
     */
    protected function setUp()
    {
        parent::setUp();

        $this->messageObject = new Message();

        $fakerInstance = Factory::create('ru_RU');

        $this->message = $fakerInstance->text(500);

        // Создаем тестового пользователя
        $this->userObject = User::create([
            'name' => $fakerInstance->firstNameMale,
            'email' => $fakerInstance->email,
            'password' => bcrypt($fakerInstance->password),
        ]);
    }

    /**
     * Проверка на создание сообщения
     */
    public function testCreateTestMessage()
    {
        $this->messageObject::create([
            'user_id' => $this->userObject->id,
            'message' => $this->message,
        ]);

        $this->assertDatabaseHas(($this->messageObject)->getTable(), [
            'user_id' => $this->userObject->id,
            'message' => $this->message
        ]);
    }
}
