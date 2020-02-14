<?php

declare(strict_types=1);

namespace MangoSylius\SyliusContactFormPlugin\Model;

interface ContactFormSettingsProviderInterface
{
    public function __construct(array $config);

    public function isSendCustomer(): bool;

    public function isNameRequired(): bool;

    public function isPhoneRequired(): bool;

    public function isSendManager(): bool;
}
