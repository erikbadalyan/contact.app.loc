<?php

/*
mysql -uroot -p -e "CREATE DATABASE contact_loc_db"
php artisan migrate:install
php artisan migrate
php artisan make:migration create_companies_table
php artisan migrate
php artisan migrate:rollback
php artisan migrate:rollback
php artisan make:seeder CompaniesTableSeeder
php artisan db:seed --class=CompaniesTableSeeder
php artisan db:seed
php artisan make:model Company
php artisan tinker
use app\Models\Company
Company::all()
Company::take(3)->get()
Company::first()
Company::find(1)
Company::find([1, 2, 3])
Company::where('website', 'hettinger.com')->first()

$company = new Company()
$company->name = "My company"
$company->address = "My Address"
$company->email = "mycompany@test.com"
$company->website = "mywebsite.com"
$company->save()

$company->website = "mywebsitecompany.com"
$company->save()

$company = Company::find(1)
$company->delete()
Company::destroy(11)
Company::destroy([7, 8, 9])

php artisan tinker
use App\Models\Company
$data = ["name" => "Company 15", "address" => "address", "email" => "test@gmail.com", "website" => "https://company15.com"]
Company::create($data)
$data = ["name" => "Company 15", "address" => "address", "email" => "test@gmail.com", "website" => "https://company15.com", "contact" => "contact company 15"]
Company::create($data)
$data = ["name" => "Company 15", "address" => "address", "email" => "test@gmail.com", "website" => "https://company15.com", "contact" => "contact company 15"]
Company::create($data)
$company = Company::first()
$company->update($data)
php artisan make:model Contact -m

php artisan tinker
use App\Models\Company
use App\Models\Contact
$company = Company::first()
$contact1 = new Contact
$contact1->first_name = "John"
$contact1->last_name = "Doe"
$contact1->email = "johndoe@gmail.com"
$contact1->address = "john Doe address"
$contact1->company_id = $company->id
$contact1->save()
$contact2 = new Contact
$contact2->first_name = "Jane"
$contact2->last_name = "Roe"
$contact2->email = "janeroe@gmail.com"
$contact2->address = "Jane Roe address"
$company->contacts()->save($contact2)

$contact1 = new Contact
$contact1->first_name = "John"
$contact1->last_name = "Doe"
$contact1->email = "johndoe@gmail.com"
$contact1->address = "john Doe address"
$contact2 = new Contact
$contact2->first_name = "Jane"
$contact2->last_name = "Roe"
$contact2->email = "janeroe@gmail.com"
$contact2->address = "Jane Roe address"
$contacts = [$contact1, $contact2]
$company->contacts()->saveMany($contacts)

$contact1 = ['first_name' => 'John', 'last_name' => 'Doe', 'email' => 'johndoe@gmail.com', 'address' => 'john Doe address']
$company->contacts()->create($contact1)

$company = Company::first()
$contact1 = ['first_name' => 'John', 'last_name' => 'Doe', 'email' => 'johndoe@gmail.com', 'address' => 'john Doe address']
$contact2 = ['first_name' => 'Jane', 'last_name' => 'Roe', 'email' => 'janeroe@gmail.com', 'address' => 'Jane Roe address']
$contacts = [$contact1, $contact2]
$company->contacts()->createMany($contacts)

$company->contacts()
$company->contacts()-get()
$company->contacts()->find(7)
$company->contacts()->orderBy('id', 'desc')->first()
$company->contacts

$contact = Contact::first()
$contact->company()
$contact->company
$contact->company()->first()

$company->contacts()->first()->delete()
$company->contacts()->delete()

$company->contacts
$company->load('contacts')
$company->contacts
*/
