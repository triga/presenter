<?php namespace Triga\Presenter;

use Triga\Presenter\Exception\InvalidFormatTypeException;

/**
 * Fetches data from a source object in a specific format.
 *
 * @package Triga\Presenter
 */
class Presenter
{
    protected $formatters = [
        'json' => 'JSON',
    ];

    /**
     * Return data from a source obejct.
     *
     * @param $source
     * @param string $format
     * @return string
     */
    public function getAs($source, $format)
    {
        $formatter = $this->getFormatter($format);

        return $formatter->get($source);
    }

    /**
     * Returns an isntance of a formatter.
     *
     * @param string $format
     * @return mixed
     */
    public function getFormatter($format)
    {
        if (false === array_key_exists($format, $this->formatters)) {
            throw new InvalidFormatTypeException;
        }

        $formatterClassName = 'Triga\Presenter\Format\\' . $format;

        return new $formatterClassName;
    }
}
