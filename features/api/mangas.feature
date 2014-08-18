Feature: Mangas
	In order to display mangas
	As an anonymous client api user
	I want to be able to know which mangas are availables

	Background:
		Given there are following mangas:
			| name        |
			| Naruto      |
			| One Piece   |
			| Death Note  |

	Scenario: list mangas
		Given I send a GET request to "/api/mangas"
		Then the response status code should be 200
		And the JSON response should match
		"""
			{
				{
					'id': '@integer',
					'name': '@string@'				
				}
			}
		"""

