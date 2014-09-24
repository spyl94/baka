Feature: Loading
  In order to display mangas
  As the proprietary
  I want to be able load mangas I previously uploaded

  Background:
    Given the database is empty
    And there are the following manga pages in "Public":
      | manga      | content     | page    |
      | Naruto     | Tome 01     | 000.jpg |
      | Naruto     | Tome 01     | 001.jpg |
      | Naruto     | Tome 01     | 002.jpg |
      | Naruto     | Tome 02     | 000.jpg |
      | Naruto     | Chapitre 01 | 000.jpg |
      | One Piece  | Tome 01     | 001.jpg |
    And there are the following manga pages in "Private":
      | manga      | content     | page    |
      | Death Note | Tome 01     | 000.jpg |
      | Death Note | Tome 01     | 001.jpg |
      | Death Note | Tome 02     | 000.jpg |
      | One Piece  | Tome 02     | 001.jpg |

  Scenario: load mangas
    When I run "baka:load" command
    Then The command exit code should be 0
    And the following manga contents are persisted:
      | manga      | content     | visibility |
      | Naruto     | Tome 01     | public     |
      | Naruto     | Tome 02     | public     |
      | Naruto     | Chapitre 01 | public     |
      | One Piece  | Tome 01     | public     |
      | Death Note | Tome 01     | private    |
      | Death Note | Tome 02     | private    |
      | One Piece  | Tome 02     | private    |
    And I should see "Database is now sync with your files"
