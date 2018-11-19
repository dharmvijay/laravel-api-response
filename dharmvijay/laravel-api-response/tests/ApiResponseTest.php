<?php

class Fruits extends \Dharmvijay\LaravelApiResponse\APIResponse
{

    public function apiRespondWithMessageAndPayload()
    {
        $data = ['mango', 'pineapple'];
        $this->respondWithMessageAndPayload($data, 'fruits data found successfully.');

    }

}

class ApiResponseTest extends PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function it_has_a_default_value()
    {
        $fruits = new Fruits();
        $default = $fruits->apiRespondWithMessageAndPayload();
    }

}
