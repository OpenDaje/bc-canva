#@todo
Feature: Generation of an empty bc-canva image
  In order to visulize the software information  by command line
  As a developer
  I want to use the bc-canva script

  Scenario: Visualize the software name running a script
    When I run "bc-canva -V"
    Then it should pass
    Then it should retrieve "BC canva"

  Scenario: Visualize the software version running a script
    When I run "bc-canva -V"
    Then it should pass
    Then it should retrieve the version as "0.0.0"