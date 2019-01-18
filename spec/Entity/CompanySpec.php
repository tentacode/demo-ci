<?php

namespace spec\App\Entity;

use App\Entity\Company;
use App\Entity\Person;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CompanySpec extends ObjectBehavior
{
    function let(Person $person)
    {
        $person->getName()->willReturn('Toto');

        $this->beConstructedWith(1234, $person);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Company::class);
    }

    function it_has_a_name()
    {
        $this->getName()->shouldReturn('1234');
    }

    function it_has_owner()
    {
        $person = $this->getOwner();
        $person->getName()->shouldReturn('Toto');
    }
}
