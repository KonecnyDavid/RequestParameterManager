<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 05/10/2018
 * Time: 18:55
 */

namespace TheCookieShows\RequestParameterManager;


use Symfony\Component\HttpFoundation\ParameterBag;
use RequestParameterManager\Exception\EmptyException;

/**
 * Class RequestParameterProcessor Processes query and fills parameters with values
 * @package TheCookieShows\RequestParameterManager
 */
class RequestParameterProcessor
{
    /**
     * Method for processing Request Parameters
     * @param array $parameters
     * @param ParameterBag $parameterBag
     * @return array
     * @throws EmptyException
     */
    public static function process(array $parameters, ParameterBag $parameterBag){
            foreach ($parameters as $field){
                if ($parameterBag->has($field->getName())){
                    $field->setValue($parameterBag->get($field->getName()));

                }elseif ($field->isRequired()){
                    throw new EmptyException();
                }
            }
            return $parameters;
    }
}