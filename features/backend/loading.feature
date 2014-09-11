Feature: Loading
  In order to display mangas
  As the proprietary
  I want to be able load mangas I previously uploaded

  Background:
    Given there are the following manga pages:
      | manga      | content     | page    |
      | Naruto     | Tome 01     | 000.jpg |
      | Naruto     | Tome 01     | 001.jpg |
      | Naruto     | Tome 01     | 002.jpg |
      | Naruto     | Tome 02     | 000.jpg |
      | Naruto     | Chapitre 01 | 000.jpg |
      | One Piece  | Tome 01     | 001.jpg |

  Scenario: load mangas
    When I run "baka:load" command
    Then The command exit code should be 0
    And I should see "Database is now sync with your files"
