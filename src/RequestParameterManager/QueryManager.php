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
 * Class QueryManager Used to manage query parameters
 * @package TheCookieShows\RequestParameterManager
 */
class QueryManager
{
    /**
     * @var array of given Parameters
     */
    private $parameters;

    /**
     * QueryManager constructor.
     * @param array $parameters
     * @param ParameterBag $parameterBag
     * @throws EmptyException
     */
    public function __construct(array $parameters, ParameterBag $parameterBag)
    {
        $this->parameters = QueryParameterProcessor::process($parameters, $parameterBag);
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
        return $element[0]->getValue();
    }
}