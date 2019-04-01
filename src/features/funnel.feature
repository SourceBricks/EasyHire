Feature: Lead creation - app should be able to create Lead
  In order to apply for position
  As a possible candidate
  I need to be able to submit some data

  Rules:
  - Firstname is filled
  - Lastname is filled
  - Phone number is filled and valid
  - Email is filled and valid

  Scenario:
    When user submits firstname "first name", lastname "last name", email "test@test.com", phone number "+490160123123123"
    Then Lead should be created with referral "applied-by-himself"

