# Laravel json api response

Create a base api respnse class to laravel framework.

## Installation

Require this package with composer:

```php
composer require dharmvijay/laravel-api-response dev-master
```


## Usage

Check below index and store operations

```php
<?php

namespace App\Http\Controllers;

use Dharmvijay\LaravelApiResponse\APIResponse;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    protected $apiResponse;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(APIResponse $apiResponse)
    {
        $this->apiResponse = $apiResponse;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = ['mango', 'pineapple'];
        $response = $this->apiResponse->respondWithMessageAndPayload($data, 'fruits data found successfully.');
        return $response;
    }

    /**
     * create new user
     * @return mixed|string
     */

    public function store()
    {
        $data = [];
        DB::beginTransaction();
        try {
            
            //... some operations here ...
            $response = $this->apiResponse->respondCreatedWithPayload(
                $data,
                "Backup created successfully."
            );
        } catch (\Exception $ex) {
            DB::rollBack();
            $response = $this->apiResponse->handleAndResponseException($ex);
        }
        DB::commit();
        return $response;
    }
}
```
