<?php

namespace App\Nova;

use App\Models\Coin;
use App\Models\CoinOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;

class PurchaseOrder extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\PurchaseOrder::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'coin_order_id';

    public function title()
    {
        $coinOrder = CoinOrder::find($this->coin_order_id);

        if ($coinOrder) {
            $coin = Coin::find($coinOrder->coin_id);
            $user = User::find($coinOrder->user_id);

            return $user->name .'-'. $coin->code;
        }

        return '';
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'coin_order_id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            BelongsTo::make('CoinOrder')->display(function ($coinOrder)
            {
                $coin = Coin::find($coinOrder->coin_id);
                $user = User::find($coinOrder->user_id);

                return $coin->code . ' - ' . $user->name;
            }),
            Number::make(__('Tiền Mua'), 'buy_money')->step(0.01),
            Number::make(__('Giá Mua'), 'buy_price')->step(0.01),
            Number::make(__('Số Lượng'), 'quantity')->step(0.01),
            Date::make('Created At'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *œ
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
