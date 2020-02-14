@message_form
Feature: Send message
  In order to contact the registered customer
  As an Administrator
  I want to have an appropriate form on the administrator panel

  Background:
    Given the store operates on a single channel in "United States"
    And there is a customer "sylius@mangoweb.eu" that submits a contact form
    And I am logged in as an administrator

  @ui @email
  Scenario: Being able to send a message as an administrator
    When I view the summary of the message "1"
    And I write an answer message
    And I send the answer message
    Then an email should be sent to "sylius@mangoweb.cz"
    And I should be notified that the message as been created
    And I see the message created