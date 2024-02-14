<?php

namespace App\Services\JSONPlaceholder;

use App\Types\Address;
use App\Types\Company;
use App\Types\Geo;
use App\Types\User;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;

class JSONPlaceholder
{
    protected $client;
    protected $url;
   public function __construct(Client $client)
   {
       $this->client=$client;
       $this->url = config('jsonplaceholder.url');
   }
   public function getAllUsers(){
       try{
           $response = $this->client->get("{$this->url}/users");

       }catch (\Exception $exception){
           Log::error('error getting data', ['error'=>$exception->getMessage()]);
       }
       $jsonDataConvert= json_decode($response->getBody()->getContents());
       $responseUsers = new Collection();
       foreach ($jsonDataConvert as $user){
           $userDto= new User();
           $userDto->id= $user->id;
           $userDto->address= new Address();
           $userDto->address->city= $user->address->city;
           $userDto->address->street= $user->address->street;
           $userDto->address->suite= $user->address->suite;
           $userDto->address->zipcode= $user->address->zipcode;

           $userDto->address->geo= new Geo();
           $userDto->address->geo->lat= $user->address->geo->lat;
           $userDto->address->geo->lng= $user->address->geo->lng;


           $userDto->company= new Company();
           $userDto->company->bs= $user->company->bs;
           $userDto->company->name= $user->company->name;
           $userDto->company->catchPhrase= $user->company->catchPhrase;

           $userDto->name= $user->name;
           $userDto->email= $user->email;
           $userDto->phone= $user->phone;
           $userDto->username= $user->username;
           $userDto->website= $user->website;
           //the placeholder api does not send the sex is made random, for the exercise true is male and false is female
           $userDto->sex= $user->id % 2 ===0;
           $responseUsers->push($userDto);

       }
       return $responseUsers;
   }
}
