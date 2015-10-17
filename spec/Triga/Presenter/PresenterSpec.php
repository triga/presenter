<?php namespace spec\Triga\Presenter;

use Prophecy\Prophet;
use Prophecy\Argument;
use PhpSpec\ObjectBehavior;

class PresenterSpec extends ObjectBehavior
{
    function it_throws_exception_on_unsupported_formatter_type()
    {
        $this->shouldThrow('Triga\Presenter\Exception\InvalidFormatTypeException')->during('getAs', [new \stdClass, 'nope']);
    }

    function it_calls_proper_formatter()
    {
        $prophet = new Prophet;
        $source = $prophet->prophesize('Triga\Presenter\Contract\PresentableAsJSONInterface');

        $source->getDataAsJSON()->shouldBeCalled();

        $this->getAs($source, 'json');
    }

    function it_returns_a_proper_formatter()
    {
        $this->getFormatter('json')->shouldBeAnInstanceOf('Triga\Presenter\Format\JSON');
    }
}
