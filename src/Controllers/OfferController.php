<?php

namespace pedram\discount\Controllers;

use Illuminate\Http\Request;
use pedram\discount\Models\Discount;
use pedram\discount\Models\Offer;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::paginate(10);
        dump($offers);
        die;
    }

    public function create()
    {
        return view('discount::offer.create');
    }
}
