<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelUserTest extends TestCase
{
    use databaseTransactions;

    // Экземпляр модели User
    private $userObject;

    private $name;

    private $email;

    private $password;

    /**
     * Set Up
     */
    protected function setUp()
    {
        parent::setUp();

        $this->userObject = new User();

        $fakerInstance = Factory::create('ru_RU');;
        $this->name = $fakerInstance->firstNameMale;
        $this->email = $fakerInstance->email;
        $this->password = $fakerInstance->password;
    }

    /**
     * Проверка на отсутствие пользователя со случаным Email
     */
    public function testCheckEmailNotExists()
    {
        $user = $this->userObject->where('email', $this->email)->count();

        $this->assertEquals(0, $user);
    }

    /**
     * Создание пользователя в модели User
     */
    public function testCreateUser()
    {
        \factory(User::class)->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        $this->assertDatabaseHas(($this->userObject)->getTable(), [
            'name' => $this->name,
            'email' => $this->email,
        ]);
    }

    public function tearDown()
    {
        parent::tearDown();
    }
}
