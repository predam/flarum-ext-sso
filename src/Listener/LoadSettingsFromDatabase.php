<?php

namespace Maicol07\SSO\Listener;

use Flarum\Settings\SettingsRepositoryInterface;
use Illuminate\Contracts\Events\Dispatcher;

class LoadSettingsFromDatabase
{
    /** @var SettingsRepositoryInterface */
    protected $settings;

    public function __construct(SettingsRepositoryInterface $settings)
    {
        if ($settings->get('maicol07-sso.disable_login_btn')) {
            $settings->set('maicol07-sso.remove_login_btn', $settings->get('maicol07-sso.disable_login_btn'));
            $settings->set('maicol07-sso.remove_signup_btn', 'maicol07-sso.disable_signup_btn');
            $settings->delete('maicol07-sso.disable_login_btn');
            $settings->delete('maicol07-sso.disable_signup_btn');
        }
        $this->settings = $settings;
    }

    public function subscribe(Dispatcher $events): void
    {

    }
}
