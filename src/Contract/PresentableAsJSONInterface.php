<?php namespace Triga\Presenter\Contract;

interface PresentableAsJSONInterface
{

    /**
     * Returns data as JSON.
     *
     * @return string
     */
    public function getDataAsJSON();
}
