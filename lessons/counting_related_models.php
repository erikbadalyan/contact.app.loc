<?php

/*

php artisan tinker

use App\Models\user
use DB

DB::listen(function($query) { dump($query->sql, $query->bindings); })
$users = User::with('companies', 'contacts')->take(2)->get()
foreach($users as $user) {
  echo $user->companies->count() . " companies, " . $user->contacts->count() . "contact\n";
}

$users = User::withCount(['companies', 'contacts'])->take(2)->get()

$users = User::withCount(['companies', 'contacts as contacts_number'])->take(2)->get()

$users = User::withCount(['companies as companies_count_with_and_word' => function($query) { $query->where('name', 'LIKE', '%and%'); }])->take(2)->get()

$users = User::withCount(['companies', 'companies as companies_count_with_and_word' => function($query) { $query->where('name', 'LIKE', '%and%'); }])->take(2)->get()

$users = User::take(2)->get()
$users->loadCount('companies')
$users->loadCount(['companies' => function($query) { $query->where('name', 'LIKE', '%and%'); }])

User::withCount(['contacts'])->select(['name', 'email'])->take(2)->get()

User::select(['name', 'email'])->withCount(['contacts'])->take(2)->get()

*/
