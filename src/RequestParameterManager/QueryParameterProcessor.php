<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 05/10/2018
 * Time: 18:55
 */

namespace RequestParameterManager;


use Symfony\Component\HttpFoundation\ParameterBag;
use RequestParameterManager\Exception\EmptyException;

/**
 * Class QueryParameterProcessor Processes query and fills parameters with values
 * @package TheCookieShows\RequestParameterManager
 */
class QueryParameterProcessor
{
    /**
     * Method for processing query
     * @param array $queryParameters
     * @param ParameterBag $parameterBag
     * @return array
     * @throws EmptyException
     */
    public static function process(array $queryParameters, ParameterBag $parameterBag){
            foreach ($queryParameters as $field){
                if ($parameterBag->has($field->getName())){
                    $field->setValue($parameterBag->get($field->getName()));

                }elseif ($field->isRequired()){
                    throw new EmptyException();
                }
            }
            return $queryParameters;
    }
}