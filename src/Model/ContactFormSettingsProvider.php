<?php

declare(strict_types=1);

namespace MangoSylius\SyliusContactFormPlugin\Model;

class ContactFormSettingsProvider implements ContactFormSettingsProviderInterface
{
    /** @var bool */
    private $nameRequired;
    /** @var bool */
    private $phoneRequired;
    /** @var bool */
    private $sendManager;
    /** @var bool */
    private $sendCustomer;

    public function __construct(array $config)
    {
        $this->nameRequired = $config['name_required'];
        $this->phoneRequired = $config['phone_required'];
        $this->sendManager = $config['send_manager_mail'];
        $this->sendCustomer = $config['send_customer_mail'];
    }

    /**
     * @return bool
     */
    public function isSendCustomer(): bool
    {
        return $this->sendCustomer;
    }

    /**
     * @return bool
     */
    public function isNameRequired(): bool
    {
        return $this->nameRequired;
    }

    /**
     * @return bool
     */
    public function isPhoneRequired(): bool
    {
        return $this->phoneRequired;
    }

    /**
     * @return bool
     */
    public function isSendManager(): bool
    {
        return $this->sendManager;
    }
}
