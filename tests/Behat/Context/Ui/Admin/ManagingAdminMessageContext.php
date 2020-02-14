<?php

declare(strict_types=1);

namespace Tests\MangoSylius\SyliusContactFormPlugin\Behat\Context\Ui\Admin;

use Behat\Behat\Context\Context;
use Sylius\Behat\NotificationType;
use Sylius\Behat\Service\NotificationCheckerInterface;
use Sylius\Component\Core\Test\Services\EmailCheckerInterface;
use Tests\MangoSylius\SyliusContactFormPlugin\Behat\Pages\Admin\Message\ShowPageInterface;
use Webmozart\Assert\Assert;

final class ManagingAdminMessageContext implements Context
{
    /**
     * @var ShowPageInterface
     */
    private $showPage;
    /**
     * @var NotificationCheckerInterface
     */
    private $notificationChecker;
    /**
     * @var EmailCheckerInterface
     */
    private $emailChecker;

    public function __construct(
        ShowPageInterface $showPage,
        NotificationCheckerInterface $notificationChecker,
        EmailCheckerInterface $emailChecker
    ) {
        $this->showPage = $showPage;
        $this->notificationChecker = $notificationChecker;
        $this->emailChecker = $emailChecker;
    }

    /**
     * @When I view the summary of the message :arg1
     */
    public function iViewTheSummaryOfTheMessage(int $arg1)
    {
        $this->showPage->open(['id' => $arg1]);
    }

    /**
     * @When I write an answer message
     */
    public function iWriteAnAnswerMessage()
    {
        $this->showPage->addMessage();
    }

    /**
     * @When I send the answer message
     */
    public function iSendTheAnswerMessage(): void
    {
        $this->showPage->sendMessage();
    }

    /**
     * @Then I should be notified that the message as been created
     */
    public function iShouldBeNotifiedThatTheMessageAsBeenCreated(): void
    {
        $this->notificationChecker->checkNotification(
            'The message was successfully sent.',
            NotificationType::success()
        );
    }

    /**
     * @Then I see the message created
     */
    public function iSeeTheMessageCreated()
    {
        $this->showPage->showMessage();
    }

}