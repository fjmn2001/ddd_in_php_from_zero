Feature: Create a new course
  In order to have courses on the platform
  As a user with permissions
  I want to create a new course

  Scenario: A valid non existing course
    Given I send a PUT request to "/courses/62fd1add-fb01-4b6a-be12-57441545de38" with body:
    """
    {
      "name": "The best course",
      "duration": "5 hours"
    }
    """
    Then the response status code should be 201
    And the response should be empty