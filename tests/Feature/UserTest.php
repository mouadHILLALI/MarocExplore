<?php

namespace Tests\Feature;

use App\Models\Trajectory;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create();
        $data =[
            'email'=> $user->email ,
            'password' => 'password' ,
        ];
        $response = $this->post('api/User/Login' , $data);
        $response->assertStatus(200);
    }
    public function register_test(){
        $user = User::factory()->create();
        $data =[
            'name'=> $user->name ,
            'email'=> $user->email ,
            'password' => 'password' ,
        ];
        $response = $this->post('api/User/register' , $data);
        $response->assertStatus(200);
    }
    public function trajectory_test(){
        $trajectory = Trajectory::factory()->create();
        $data = [
            'title' => $trajectory->title , 
        ] ;
        $response = $this->post('api/Trajectory/Create' , $data);
        $response->assertStatus(200);
    }
}
