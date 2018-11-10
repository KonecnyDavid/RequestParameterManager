# Request Parameter manager
Request parameter manager is PHP package for object oriented way to get request (post, get) parameters. Also supports value parser to parse parameters value into format you want.

## Installation:
Just require via composer
```
composer install thecookieshows/request-parameter-manager
```
## Usage
### RequestManager
Create new instance of RequestManager. First parameter is array of RequestParameters, second is instance of ParameterBag
```php
$queryManager = new QueryManager([new QueryParameter('id')], $request->request);
```
### RequestParameter
Constructor of request parameter
1. Name of parameter
1. Default value (default is "")
1. Is Required (default is False)
```php
$queryParameter = new QueryParameter('id', '1', false);
```
### Get RequestParameterValue
```php
$id = $queryManager->getParameterValue('id');
```
### Set RequestParameterParser
Pass instance of parser into setParser() method
```php
$requestParameter->setParser(new DateParser();
```
### Create new Parser
Just implement ParserInterface
```php
class DatetimeParser implements ParserInterface
{
    public function parse(string $input, string $format = "d-m-Y H:i:s") : \DateTime
    {
        return \DateTime::createFromFormat($format, $input);
    }
}
```