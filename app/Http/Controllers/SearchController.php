<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
// use Illuminate\Http\Request;
use App\Http\Resources\Customer as CustomerResource;

class SearchController extends Controller
{
    public function index()
    {
        $data = request()->validate([
            'searchTerm' => 'required'
        ]);

        $customer = Customer::search($data['searchTerm'])->get();
        return CustomerResource::collection($customer);
    }
}
