Feature: Create a new course
  In order to have course on the platform
  A user with admin permissions
  I want to create a new course

  Scenario: A valid non exists course
    Given I send a PUT request to "/courses/ff49c630-d16b-4d6d-a701-cd641d67a9c8" with body:
    """
    {
      "name":"The best course",
      "duration":"5 hours"
    }
    """
    Then the response status code should be 201
    And the response should be empty