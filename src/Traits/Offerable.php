<?php


namespace pedram\discount\Traits;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use pedram\discount\Models\Discount;
use pedram\discount\Models\Offer;

abstract class Offerable extends Model
{
    /**
     * Return name of integer field that discount will apply to it
     *
     * @return string
     */
    abstract function getDiscountableFieldAttribute():string ;

    /**
     * Get all available discount for discountable
     *
     * @return MorphToMany
     */
    public function discounts()
    {
        return $this->morphToMany(Discount::class, 'discountable');
    }

    /**
     * Get all offers belongs to offerable
     *
     * @return MorphToMany
     */
    public function offers()
    {
        return $this->morphToMany(Offer::class , 'offerable');
    }

    /**
     * Add an offer to offerable
     *
     * @param Offer $offer
     * @return bool|void
     */
    public function addOffer(Offer $offer)
    {
        try {
            $this->offers()->attach($offer->id);
            return true;
        }catch (\Throwable $throwable){
            return false;
        }
    }
}
