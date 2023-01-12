<?php

namespace pedram\discount\Controllers;

use Illuminate\Http\Request;
use pedram\discount\Models\Discount;

class DiscountController extends Controller
{
    public function index()
    {
        dump(Discount::all());
        die;
    }
}
