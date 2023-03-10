<?php

namespace App\Domains\Auth\Models\Traits\Scope;

/**
 * Class PermissionScope.
 */
trait PermissionScope
{
    /**
     * @return mixed
     */
    public function scopeIsMaster($query)
    {
        return $query->whereDoesntHave('parent')
            ->whereHas('children');
    }

    /**
     * @return mixed
     */
    public function scopeIsParent($query)
    {
        return $query->whereHas('children');
    }

    /**
     * @return mixed
     */
    public function scopeIsChild($query)
    {
        return $query->whereHas('parent');
    }

    /**
     * @return mixed
     */
    public function scopeSingular($query)
    {
        return $query->whereNull('parent_id')
            ->whereDoesntHave('children');
    }
}
