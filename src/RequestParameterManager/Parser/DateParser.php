<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 06/10/2018
 * Time: 14:15
 */

namespace TheCookieShows\RequestParameterManager\Parser;


class DateParser implements ParserInterface
{
    public function parse(string $input)
    {
        return \DateTime::createFromFormat("Y-m-d", $input);
    }
}