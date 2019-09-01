<?php
/**
 * Created by PhpStorm.
 * User: sparrow
 * Date: 9/1/19
 * Time: 4:17 PM
 */

namespace App\Services\AmoCRM;

use Ufee\Amo\Amoapi;


class Api
{
    public $instance;

    /**
     * Api constructor.
     * @param $settings
     * @throws \Exception
     */
    public function __construct($settings)
    {
        $this->instance = Amoapi::setInstance([
            'id' => 10,
            'domain' => config('services.amo.domain'),
            'login' => config('services.amo.login'),
            'hash' => config('services.amo.hash'),
            'zone' => 'ru', // default: ru
            'timezone' => 'Asia/Tashkent', // default: Europe/Moscow
            'lang' => 'ru' // default: ru
        ]);

        $this->instance->queries->logs(storage_path('app/amocrm/logs/queries'));

        $this->instance->autoAuth(true);
    }

    public function getContacts()
    {
        return $this->instance->contacts;
    }
}