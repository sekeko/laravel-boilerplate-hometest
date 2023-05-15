<?php

namespace App\Domains\Auth\Models\Traits\Scope;

/**
 * Class AffiliateScope.
 */
trait AffiliateScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where(function ($query) use ($term) {
            $query->where('name', 'like', '%'.$term.'%');
        });
    }

}
