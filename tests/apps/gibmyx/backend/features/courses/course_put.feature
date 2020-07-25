Feature: Create a new course
  In order to have course on the platfrom
  As a user with admin permissions
  I want to create a new course

  Scenario: A valida non exists course
    Given I send a PUT request to "/courses/5f4f77c8-8022-427b-86b9-550726a27aaf" with body:
    """
    {
      "name": "The best course",
      "duration": "5 hours"
    }
    """
    Then the response status code should be 201
    And the response should be empty