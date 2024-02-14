<?php

namespace App\Types;

use Illuminate\Support\Facades\Date;

class Geo {
    public $lat; //String
    public $lng; //String

}
class Address {
    public string $street; //String
    public Date | string $suite; //Date
    public string $city; //String
    public string $zipcode; //String
    public Geo  $geo; //Geo

}
class Company {
    public string $name; //String
    public string $catchPhrase; //String
    public string $bs; //String

}
class User {
    public int  $id; //int
    public string  $name; //String
    public string $username; //String
    public string $email; //String
    public Address $address; //Address
    public string $phone; //String
    public string $website; //String
    public Company $company; //Company
    public bool $sex;

}
