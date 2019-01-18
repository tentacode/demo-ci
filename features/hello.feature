Feature: Hello

    Scenario: Personne par défaut
        Given I am on "/"
        Then I should see "Hello Personne"

    Scenario: Search
        Given I am on "/"
        When I fill in "Qui ça ?" with "Toto"
        And I press "Chercher"
        Then I should see "Hello Toto"