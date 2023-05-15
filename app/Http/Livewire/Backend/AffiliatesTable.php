<?php

namespace App\Http\Livewire\Backend;


use App\Domains\Auth\Models\Affiliate;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class AffiliatesTable.
 */
class AffiliatesTable extends DataTableComponent
{
    /**
     * @return Builder
     */
    public function query(): Builder
    {

        $query = Affiliate::when($this->getFilter('search'), fn ($query, $term) => $query->search($term))->orderBy('affiliate_id', 'asc');

        return $query;
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Affiliate Id'), 'affiliate_id'),
            Column::make(__('Name'), 'name'),
            Column::make(__('Latitude'), 'latitude'),
            Column::make(__('Longitude'), 'longitude'),
        ];
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.auth.affiliate.includes.row';
    }
}
