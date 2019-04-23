Feature: HR Employee creates new lead
  As a HR employee
  I need to be able to enter new candidates data
  In order to be able to decide should we organise an interview

  Rules:
  - Firstname is filled
  - Lastname is filled
  - Mobile phone number or email address is filled

  Scenario: Lead applied directly
    Given that we have candidate first name
    And we have last name
    And we have phone number or email
    And we have CV
    When HR employee enter these data, upload CV and mark lead as applied-by-himself
    Then message that lead has been added should be displayed

  Scenario: Lead applied directly without CV
    Given that we have candidate first name
    And we have last name
    And we have phone number or email
    And we have CV
    When HR employee enter these data, upload CV and mark lead as applied-by-himself
    Then appropriate message that CV is missing should be displayed

  Scenario: Recommended by existing employee
    Given that one of employees recommended candidate
    And we have CV
    And we have first name
    And we have last name
    And we have phone number or email
    When HR employee enter these data, upload CV and mark lead as internal-recommendation
    Then message that lead has been added should be displayed

  Scenario: Recommended by existing employee but without CV
    Given that we do not have CV
    And we have first name
    And we have second name
    And we have phone number or email
    When HR employee enter these data, upload CV and mark lead as internal-recommendation
    Then appropriate message that CV is missing should be displayed

  Scenario: Lead is send by external head hunter
    Given that external head hunter or agency send recommendation or we find candidate on their web site
    And we have cv of the candidate
    And we have first name
    And we have second name
    And we have phone number or email
    Then we should be able to add this candidate to the system
    And to upload cv document in .pdf file format
    And to mark this lead as external-referral
    And to add name of the agency or head hunter

  Scenario: Lead is send by external head hunter without CV
    Given that we do not have CV
    And we have first name
    And we have second name
    And we have phone number or email
    Then we should NOT be able to mark this lead as external-referral
    And appropriate message that CV is missing should be displayed

  Scenario: Lead is found by the internal HR employee
    Given that HR reached candidate directly
    And we have first name
    And we have second name
    And we have phone number or email
    Then we should be able to add this candidate to the system
    And to mark this lead as found-by-hr
    And we should be able to add source where we have found him, eg. facebook, linkedin etc.
