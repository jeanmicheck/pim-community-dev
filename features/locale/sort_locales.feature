@javascript
Feature: Sort locales
  In order to sort locales in the catalog
  As a user
  I need to be able to sort locales by several columns in the catalog

  Background:
    Given the "default" catalog configuration
    And I am logged in as "admin"

  Scenario: Successfully sort locales
    Given I am on the locales page
    Then the rows should be sorted ascending by code
    And I should be able to sort the rows by code and activated
