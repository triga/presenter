<?php namespace Triga\Presenter\Format;

use Triga\Presenter\Contract\PresentableAsJSONInterface;

class JSON
{
    public static function get(PresentableAsJSONInterface $source)
    {
        return $source->getDataAsJSON();
    }
} 