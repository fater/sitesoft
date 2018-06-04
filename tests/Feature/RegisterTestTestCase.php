<?php

namespace Tests\Feature;

use Tests\DuskTestCase;

class RegisterTestTestCase extends DuskTestCase
{
    /**
     * Доступность страницы Регистрация
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->get('register')
            ->assertSee('Регистрация')
            ->assertStatus(200);
    }
}
