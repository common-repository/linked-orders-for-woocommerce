<?php

declare (strict_types=1);
namespace DWS_LOWC_Deps\DI\Invoker;

use DWS_LOWC_Deps\DI\Definition\Definition;
use DWS_LOWC_Deps\DI\Definition\Helper\DefinitionHelper;
use DWS_LOWC_Deps\DI\Definition\Resolver\DefinitionResolver;
use DWS_LOWC_Deps\Invoker\ParameterResolver\ParameterResolver;
use ReflectionFunctionAbstract;
/**
 * Resolves callable parameters using definitions.
 *
 * @since 5.0
 * @author Matthieu Napoli <matthieu@mnapoli.fr>
 */
class DefinitionParameterResolver implements ParameterResolver
{
    /**
     * @var DefinitionResolver
     */
    private $definitionResolver;
    public function __construct(DefinitionResolver $definitionResolver)
    {
        $this->definitionResolver = $definitionResolver;
    }
    public function getParameters(ReflectionFunctionAbstract $reflection, array $providedParameters, array $resolvedParameters) : array
    {
        // Skip parameters already resolved
        if (!empty($resolvedParameters)) {
            $providedParameters = \array_diff_key($providedParameters, $resolvedParameters);
        }
        foreach ($providedParameters as $key => $value) {
            if ($value instanceof DefinitionHelper) {
                $value = $value->getDefinition('');
            }
            if (!$value instanceof Definition) {
                continue;
            }
            $value = $this->definitionResolver->resolve($value);
            if (\is_int($key)) {
                // Indexed by position
                $resolvedParameters[$key] = $value;
            } else {
                // Indexed by parameter name
                // TODO optimize?
                $reflectionParameters = $reflection->getParameters();
                foreach ($reflectionParameters as $reflectionParameter) {
                    if ($key === $reflectionParameter->name) {
                        $resolvedParameters[$reflectionParameter->getPosition()] = $value;
                    }
                }
            }
        }
        return $resolvedParameters;
    }
}
