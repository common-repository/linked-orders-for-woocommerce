<?php

declare (strict_types=1);
namespace DWS_LOWC_Deps\DI;

use DWS_LOWC_Deps\Psr\Container\ContainerExceptionInterface;
/**
 * Exception for the Container.
 */
class DependencyException extends \Exception implements ContainerExceptionInterface
{
}
