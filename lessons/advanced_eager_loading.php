<?php

/*
Using User model
How many companies and contacts of each user

php artisan tinker

use App\Models\user
use DB
DB::listen(function($query) { dump($query->sql, $query->bindings); })
$users = User::get()
foreach($users as $user) {
  echo $user->companies->count() . " companies, " . $user->contacts->count() . "contact\n";
}

$users = User::with(['companies', 'contacts'])->get()
foreach($users as $user) {
  echo $user->companies->count() . " companies, " . $user->contacts->count() . "contact\n";
}

$users = User::get()
foreach($users as $user) {
  foreach($user->companies as $company) {
    echo $company->name . " " . $company->contacts->count() . " contacts\n";
  }
}

$users = User::with(['companies', 'contacts'])->get()
foreach($users as $user) {
  foreach($user->companies as $company) {
    echo $company->name . " " . $company->contacts->count() . " contacts\n";
  }
}

$users = User::with(['companies', 'companies.contacts'])->get()
foreach($users as $user) {
  foreach($user->companies as $company) {
    echo $company->name . " " . $company->contacts->count() . " contacts\n";
  }
}

Company::pluck('name')
User::with(['companies'=> function($query) { $query->where('name', 'LIKE', '%and%'); }])->get()

$users = User::take(2)->get()
$users->load('companies')

define $with property in User model
$users = User::take(2)->get()
$users = User::without('contacts')->take(2)->get()
$users = User::without('contacts', 'companies')->take(2)->get()
*/
