Feature: Lead creation - app should be able to create Lead
  In order to apply for position
  As a possible candidate
  I need to be able to submit my personal data

  Rules:
  - Firstname is filled
  - Lastname is filled
  - Mobile phone number or Email address is filled

  Scenario:
    When app tries to create lead with firstname "first name", lastname "last name" we should not get validation error

