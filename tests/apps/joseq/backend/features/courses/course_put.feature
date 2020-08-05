Feature: Create a new course
  In order to have courses on the plataform
  As a user with admin permissions
  I want to create a new course

  Scenario: A valid non exists course
    Given I send a PUT request to "/courses/f50a0380-ef00-4aca-81cf-bb3ad990914a" with body:
    """
    {
      "name": "The best course",
      "duration": "5 hours"
    }
    """
    Then the response status code should be 201
    And the response should be empty