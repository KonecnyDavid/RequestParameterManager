<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 05/10/2018
 * Time: 19:26
 */

namespace RequestParameterManager\Parser;


/**
 * Class DatetimeParser used to parse string to Datetime
 * @package App\Utilities\Request\Query\Parser
 */
class DatetimeParser implements ParserInterface
{
    /**
     * @inheritdoc
     * @return \DateTime
     */
    public function parse(string $input) : \DateTime
    {
        return \DateTime::createFromFormat("d-m-Y H:i:s", $input);
    }
}