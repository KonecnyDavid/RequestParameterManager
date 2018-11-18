<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 05/10/2018
 * Time: 19:00
 */

namespace RequestParameterManager;


use Symfony\Component\HttpFoundation\ParameterBag;
use TheCookieShows\RequestParameterManager\Exception\EmptyException;

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
        $element = array_filter($this->parameters,
            function ($item) use ($name) {
                    return $item->getName() == $name;
                });
        reset($element);
        return $element[0]->getValue();
    }
}