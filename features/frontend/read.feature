Feature: Homepage
  As any user
  I should be able to read a manga

  Scenario: It lists manga contents
    Given I am on the reading page of "Naruto"
    Then I can see a list of contents
    And the default content is "Tome 01"
