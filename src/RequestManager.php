<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 05/10/2018
 * Time: 19:00
 */

namespace TheCookieShows\RequestParameterManager;

use ParameterDoesNotExistException;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class RequestManager Used to manage query parameters
 * @package RequestParameterManager
 */
class RequestManager
{
    /**
     * @var array of given Parameters
     */
    private $parameters;

    /**
     * RequestManager constructor.
     * @param array $parameters
     * @param ParameterBag $parameterBag
     * @throws \RequestParameterManager\Exception\EmptyException
     */
    public function __construct(array $parameters, ParameterBag $parameterBag)
    {
        $this->parameters = RequestParameterProcessor::process($parameters, $parameterBag);
    }

    /**
     * Get parameter of given name
     * @param string $name
     * @return mixed
     */
    public function getParameterValue(string $name)
    {
        $elements = array_filter($this->parameters,
            function ($item) use ($name) {
                    return $item->getName() == $name;
                });
        $first = reset($elements);

        if(!$first)
                throw new ParameterDoesNotExistException();

        return $first;
    }
}