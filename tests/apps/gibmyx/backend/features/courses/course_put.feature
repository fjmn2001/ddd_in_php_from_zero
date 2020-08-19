Feature: Create a new course
  In order to have course on the platfrom
  As a user with admin permissions
  I want to create a new course

  Scenario: A valida non exists course
#    Given I send a PUT request to "/courses/5f4f77c8-8022-427b-86b9-550726a27aaf" with body:
#    Given I send a PUT request to "/courses/97d8d4d1-5a7d-4cf0-a413-685a53ae8134" with body:
#    Given I send a PUT request to "/courses/025519e8-9fe3-4d61-8d04-0ec7610e4f25" with body:
#    Given I send a PUT request to "/courses/6ba57bfe-19d8-4c47-96d0-420dd21d8fc8" with body:
    Given I send a PUT request to "/courses/dfb3b6be-e9f7-47e8-9dd0-ed50ad9b5786" with body:
    """
    {
      "name": "The best course",
      "duration": "5 hours"
    }
    """
    Then the response status code should be 201
    And the response should be empty