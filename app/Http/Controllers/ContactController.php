<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
   public function __construct()
   {
       $this->middleware(['auth', 'verified']);
   }

    /**
     * Display a listing of the Contacts.
     *
     * @return View
     */
   public function index(): View
    {
        $companies = Company::userCompanies();

        $contacts = request()
            ->user()
            ->contacts()
            ->with('company')
            ->latestFirst()
            ->paginate(10);



        return view('contacts.index', compact('contacts', 'companies'));
    }

    /**
     * Show the form for creating a new Contact.
     *
     * @return View
     */
    public function create(): View
    {
        $contact = new Contact();

        $companies = Company::userCompanies();

        return view('contacts.create', compact('companies', 'contact'));
    }

    /**
     * Store a newly created contact in contacts table.
     *
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function store(ContactRequest $request): RedirectResponse
    {
        $request->user()
                ->contacts()
                ->create($request->all());

        return redirect()
                ->route('contacts.index')
                ->with('message', 'Contact has been added successfully');
    }

    /**
     * Show the form for editing the specified contact.
     *
     * @param  Contact  $contact
     * @return View
     */
    public function edit(Contact $contact): View
    {
        $companies = Company::userCompanies();

        return view('contacts.edit', compact('companies', 'contact'));
    }

    /**
     * Update the specified contact in contacts table.
     *
     * @param Contact $contact
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function update(Contact $contact, ContactRequest $request): RedirectResponse
    {
        $contact->update($request->all());

        return redirect()
                ->route('contacts.index')
                ->with('message', 'Contact has been updated successfully');

    }

    /**
     * Display the specified contact.
     *
     * @param  Contact  $contact
     * @return View
     */
    public function show(Contact $contact): View
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Remove the specified company from contacts table.
     *
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect()
                ->route('contacts.index')
                ->with('message', 'Contact has been deleted successfully');
    }
}
