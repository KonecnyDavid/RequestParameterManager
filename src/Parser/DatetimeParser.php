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
    private $format;
    public function __construct(string $format)
    {
        $this->format = $format;
    }

    /**
     * @inheritdoc
     * @return \DateTime
     */
    public function parse(string $input) : \DateTime
    {
        return \DateTime::createFromFormat($this->format, $input);
    }
}