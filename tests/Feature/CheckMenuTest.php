<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CheckMenuTest extends TestCase
{
    /**
     * Доступность главной страницы
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Находим заголовок "Сайтсофт"
     *
     * @return void
     */
    public function testSiteTitle()
    {
        $this->get('/')
            ->assertSee('Сайтсофт');
    }

    /**
     * Наличие в главном меню пункта "Главная"
     *
     * @return void
     */
    public function testMenuHome()
    {
        $this->get('/')
            ->assertSee('Главная');
    }

    /**
     * Наличие в главном меню пункта "Авторизация"
     *
     * @return void
     */
    public function testMenuAuthorization()
    {
        $this->get('/')
            ->assertSee('Авторизация');
    }

    /**
     * Наличие в главном меню пункта "Регистрация"
     *
     * @return void
     */
    public function testMenuRegistration()
    {
        $this->get('/')
            ->assertSee('Регистрация');
    }
}
