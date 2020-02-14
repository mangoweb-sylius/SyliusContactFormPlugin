<?php

declare(strict_types=1);

namespace MangoSylius\SyliusContactFormPlugin\Menu;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;

class AccountContactMenuBuilder
{
    public function buildMenu(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $menu
            ->addChild('new', [
                'route' => 'mango_sylius_contact_form_shop_account_message_index',
            ])
            ->setLabel('mango_contact_form_plugin.title.customer.index')
            ->setLabelAttribute('icon', 'comments')
        ;
    }
}
