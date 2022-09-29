<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = new User();

        // $this->assertEquals(3, $user->add(1, 3), '1+2=3');
        $this->assertEquals(3, $user->add(1, 2), '1+2=3');
    }

    /** @test*/
    public function canAddDigit()
    {
        $data = [
            'a' => $this->faker->randomDigitNotNull,
            'b' => $this->faker->randomDigitNotNull
        ];
        $json = [$data['a']+$data['b']];
        // $argv
        $this->assertTrue(is_numeric($data['a']));
        $this->assertTrue(is_numeric($data['b']));
        $response = $this->json('get', '/add', $data);

        $response->assertStatus(200)
            ->dump()
            ->assertJson(compact('json'));
    }

    /** @test*/
    public function inputAValid()
    {
        $data = [
            'a' => 'a',
            'b' => '0'
        ];
        $json = 'a must be a digit';

        $response = $this->json('get', '/add', $data);

        $response->assertStatus(511)
            ->dump()
            ->assertJson(compact('json'));
    }

    /** @test*/
    public function inputBValid()
    {
        $data = [
            'a' => '3',
            'b' => 'D'
        ];
        $json = 'b must be a digit';


        $response = $this->json('get', '/add', $data);

        $response->assertStatus(511)
            ->dump()
            ->assertJson(compact('json'));
    }

    // /** @test*/
    // public function inputAString()
    // {
    //     $data = [
    //         'a' => 'a',
    //         'b' => '0'
    //     ];


    //     $response = $this->json('get', '/add', $data);

    //     $response->assertStatus(512)
    //         ->dump()
    //         ->assertJson(compact('json'));
    // }
}
