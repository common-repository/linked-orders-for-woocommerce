<?php

namespace DWS_LOWC_Deps\Laravel\SerializableClosure\Support;

use SplObjectStorage;
class ClosureScope extends SplObjectStorage
{
    /**
     * The number of serializations in current scope.
     *
     * @var int
     */
    public $serializations = 0;
    /**
     * The number of closures that have to be serialized.
     *
     * @var int
     */
    public $toSerialize = 0;
}
