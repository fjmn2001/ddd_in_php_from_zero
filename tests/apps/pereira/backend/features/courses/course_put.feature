Feature: Create a new course
  In order to have course on the platform
  A user with admin permissions
  I want to create a new course

  Scenario: A valid non exists course
    Given I send a PUT request to "/courses/62fd1add-fb01-4b6a-be12-57441545de38" with body:
    """
    {
      "name":"The best course",
      "duration":"5 hours"
    }
    """
    Then the response status code should be 201
    And the response should be empty