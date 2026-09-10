<?php

namespace Westlinks\SimpleIvr;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Westlinks\SimpleIvr\Skeleton\SkeletonClass
 */
class SimpleIvrFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'simple-ivr';
    }
}
