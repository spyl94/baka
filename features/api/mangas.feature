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
		And the JSON response should match:
"""
[
	{
		"id": @string@,
		"name": @string@,
		"image": @string@			
	},
	{
		"id": @string@,
		"name": @string@,
		"image": @string@			
	},
	{
		"id": @string@,
		"name": @string@,
		"image": @string@			
	}
]
"""
	Scenario: list content for a given manga
		Given I send a GET request to "/api/mangas/naruto"
		Then the response status code should be 200
		And the JSON response should match:
"""
[
	{
		"id": @string@,
		"name": @string@		
	},
	{
		"id": @string@,
		"name": @string@	
	}
]
"""

	Scenario: list pages for a given manga content
		Given I send a GET request to "/api/mangas/naruto/tome-01"
		Then the response status code should be 200
		And the JSON response should match:
"""
[
	{
		"id": @string@,
		"name": @string@		
	},
	{
		"id": @string@,
		"name": @string@	
	}
]
"""
