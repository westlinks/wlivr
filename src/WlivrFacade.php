<?php

namespace Westlinks\Wlivr;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Westlinks\Wlivr\Skeleton\SkeletonClass
 */
class WlivrFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'wlivr';
    }
}
