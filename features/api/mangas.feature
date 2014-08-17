Feature: Mangas
	In order to have fun
	As an anonymous user
	I want to be able to read mangas

	Background:
		Given there are following mangas:
			| name        |
			| Naruto      |
			| One Piece   |
			| Death Note  |

	Scenario: list mangas
		Given I request "/mangas"
		Then the response should be JSON
		And the response status code should be 200


