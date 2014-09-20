Feature: Homepage
  As any user
  I should be able to use chose a manga
  to read it

  Scenario: It lists manga names
    Given I am on the homepage
    Then I can see a list of mangas
    And I can click to start reading
