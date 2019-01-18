Feature: Math feature

    Scenario Outline: I should be able to make an addition
        When I add <a>
        And I add <b>
        Then the sum should be <sum>

        Examples:
            | a | b | sum |
            | 2 | 4 | 6 | 
            | 2 | 5 | 7 | 