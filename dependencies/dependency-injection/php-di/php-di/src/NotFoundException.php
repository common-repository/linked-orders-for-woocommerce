<?php

declare (strict_types=1);
namespace DWS_LOWC_Deps\DI;

use DWS_LOWC_Deps\Psr\Container\NotFoundExceptionInterface;
/**
 * Exception thrown when a class or a value is not found in the container.
 */
class NotFoundException extends \Exception implements NotFoundExceptionInterface
{
}
