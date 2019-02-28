<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 05/10/2018
 * Time: 19:26
 */

namespace TheCookieShows\RequestParameterManager\Parser;


/**
 * Class DatetimeParser used to parse string to Datetime
 * @package RequestParameterManager\Parser
 */
class DatetimeParser implements ParserInterface
{
    /**
     * @inheritdoc
     * @return \DateTime
     */
    public function parse(string $input, string $format = "d-m-Y H:i:s") : \DateTime
    {
        return \DateTime::createFromFormat($format, $input);
    }
}