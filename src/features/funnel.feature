Feature: Lead creation - app should be able to create Lead
  In order to apply for position
  As a possible candidate
  I need to be able to submit some data

  Rules:
  - Firstname is filled
  - Lastname is filled
  - Phone number is filled and valid
  - Email is filled and valid

  Scenario: User submits data into application form on website with valid data
    When user submits firstname "first name", lastname "last name", email "test@test.com", phone number "+490160123123123"
    Then Lead should be created with referral "applied-by-himself"

  Scenario: User submits data into application form on website with valid data in steps
    Given that lead is on online vacancy application form
    And enters "first name" in firstname
    And enters "last name" in lastname
    And enters "test@test.com" in email
    And enters "+490160123123123" in phone number
    And submits data
    Then lead should be created with applied-by-himself referral
