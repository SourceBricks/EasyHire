Feature: Lead Funnel create lead - Possible candidate initiates contact
  In order to apply for position
  As a possible candidate
  I need to be able to submit some data

  Rules:
  - Lead mail is valid
  - Firstname is filled
  - Lastname is filled

  Scenario:
    When lead tries to submit data with firstname "first name", lastname "last name", and valid email "mail@mail.com" should not get validation error

