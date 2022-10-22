<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserSubscriber implements EventSubscriberInterface
{
    public function onLogoutEvent($event)
    {
        // ...
    }

    public static function getSubscribedEvents()
    {
        return [
            'LogoutEvent' => 'onLogoutEvent',
        ];
    }
}
