<?php

/*
 * 1.   mysql -uroot -p -e "CREATE DATABASE contact_loc_db"
 * 2.   php artisan migrate:install
 * 3.   php artisan migrate
 * 4.   php artisan make:migration create_companies_table
 * 5.   php artisan migrate
 * 6.   php artisan migrate:rollback
 * 7.   php artisan migrate:rollback
 * 8.   php artisan make:seeder CompaniesTableSeeder
 * 9.   php artisan db:seed --class=CompaniesTableSeeder
 * 10.  php artisan db:seed
 * 11.  php artisan make:model Company
 * 12.  php artisan tinker
 *      use app\Models\Company
 *      Company::all()
 *      Company::take(3)->get()
 *      Company::first()
 *      Company::find(1)
 *      Company::find([1, 2, 3])
 *      Company::where('website', 'hettinger.com')->first()
 *
 *      $company = new Company()
 *      $company->name = "My company"
 *      $company->address = "My Address"
 *      $company->email = "mycompany@test.com"
 *      $company->website = "mywebsite.com"
 *      $company->save()
 *
 *      $company->website = "mywebsitecompany.com"
 *      $company->save()
 *
 *      $company = Company::find(1)
 *      $company->delete()
 *      Company::destroy(11)
 *      Company::destroy([7, 8, 9])
 *
 * 13.  php artisan tinker
 *      use App\Models\Company
 *      $data = ["name" => "Company 15", "address" => "address", "email" => "test@gmail.com", "website" => "https://company15.com"]
 *      Company::create($data)
 *      $data = ["name" => "Company 15", "address" => "address", "email" => "test@gmail.com", "website" => "https://company15.com", "contact" => "contact company 15"]
 *      Company::create($data)
 *      $data = ["name" => "Company 15", "address" => "address", "email" => "test@gmail.com", "website" => "https://company15.com", "contact" => "contact company 15"]
 *      Company::create($data)
 *      $company = Company::first()
 *      $company->update($data)
 *      php artisan make:model Contact -m*/
