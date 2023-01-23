<?php

namespace pedram\discount\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use pedram\discount\Traits\Offerable;

class Offer extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Calculate discount amount for a offerable
     *
     * @param $amount
     * @return float|int|mixed
     */
    public function calculateDiscountOffer($amount)
    {
        return $this->type == 'PERCENTAGE' ?
            $amount * $this->amount / 100 :
            ($amount < $this->amount ? $amount : $this->amount);
    }
}
