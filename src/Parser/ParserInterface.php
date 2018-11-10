<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 05/10/2018
 * Time: 19:25
 */

namespace TheCookieShows\RequestParameterManager\Parser;


/**
 * Interface ParserInterface Used for QueryParameter
 * @package App\Utilities\Request\Query\Parser
 */
interface ParserInterface
{
    /**
     * Should return parsed input based on given input
     * @param string $input
     * @return mixed
     */
    public function parse(string $input);
}