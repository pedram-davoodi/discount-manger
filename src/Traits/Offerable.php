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
    abstract function getDiscountableAmountFieldAttribute():string ;

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
     * Get all offers belongs to offerable
     *
     * @return MorphToMany
     */
    public function discounts()
    {
        return $this->morphToMany(Offer::class , 'offerable' , 'discounts' , 'offerable_id');
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
            if (!$this->offerAvailability($offer->code)) {
                $this->offers()->attach($offer->id);
            }
            return true;
        }catch (\Throwable $throwable){
            return false;
        }
    }

    public function calculateDiscount()
    {

    }

    /**
     * Add discount to an offerable
     *
     * @param $code
     * @return array|bool[]
     */
    public function applyDiscount($code)
    {
        try{
            throw_if(!$this->offerAvailability($code) , new \Exception("This code can not apply to this object"));

            $amount = $this->{$this->discountable_amount_field};

            $offer = $this->offers()->where('code' , $code)->first();

            $this->discounts()->attach($offer->id , ['discount_amount' => $offer->calculateDiscountOffer($amount)]);

            return [
                'success' => true,
            ];
        }catch (\Throwable $throwable){
            return [
                'success' => false,
                'message' => $throwable->getMessage()
            ];
        }
    }

    public function offerAvailability($code)
    {
        return $this->offers()->where('code' , $code)->exists();
    }
}
