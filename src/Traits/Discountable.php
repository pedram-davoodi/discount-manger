<?php


namespace pedram\discount\Traits;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use pedram\discount\Models\Discount;

abstract class Discountable extends Model
{

    abstract function getDiscountableFieldAttribute():string ;

    /**
     * get all available discount for discountable
     *
     * @return MorphToMany
     */
    public function discounts()
    {
        return $this->morphToMany(Discount::class, 'discountable');
    }
}
