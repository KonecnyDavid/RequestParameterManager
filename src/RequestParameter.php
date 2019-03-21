<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 05/10/2018
 * Time: 18:53
 */

namespace TheCookieShows\RequestParameterManager;


use TheCookieShows\RequestParameterManager\Parser\ParserInterface;

/**
 * Class RequestParameter Represents request parameter
 * @package RequestParameterManager
 */
class RequestParameter
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $value;
    /**
     * @var bool
     */
    private $required;

    /**
     * @var ?ParserInterface
     */
    private $parser = null;

    /**
     * RequestParameter constructor.
     * @param string $name
     * @param string $value
     * @param bool $required
     */
    public function __construct(string $name, string $value = "", bool $required = false)
    {
        $this->name = $name;
        $this->value = $value;
        $this->required = $required;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @param ParserInterface $parser
     * @return  RequestParameter
     */
    public function setParser(ParserInterface $parser): RequestParameter
    {
        $this->parser = $parser;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * If there is a parser then parses value otherwise gives only value
     * @return string
     */
    public function getValue()
    {
        return $this->parser !== null ? $this->parser->parse($this->value) : $this->value;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }
}