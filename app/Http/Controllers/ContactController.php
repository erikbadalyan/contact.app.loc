<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
   public function __construct()
   {
       $this->middleware(['auth', 'verified']);
   }

    public function index()
    {
        $companies = auth()
                    ->user()
                    ->companies()
                    ->orderBy('name')
                    ->pluck('name', 'id')
                    ->prepend('All Companies', '');

        $contacts = auth()
                    ->user()
                    ->contacts()
                    ->latestFirst()
                    ->paginate(10);

        return view('contacts.index', compact('contacts', 'companies'));
    }

    public function create()
    {
        $contact = new Contact();

        $companies = auth()
                    ->user()
                    ->companies()
                    ->orderBy('name')
                    ->pluck('name', 'id')
                    ->prepend('All Companies', '');

        return view('contacts.create', compact('companies', 'contact'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'address'       => 'required',
            'company_id'    => 'required|exists:companies,id'
        ]);

        $request->user()
                ->contacts()
                ->create($request->all());

        return redirect()
                ->route('contacts.index')
                ->with('message', 'Contact has been added successfully');
    }

    public function edit(Contact $contact)
    {
        $companies = auth()
                    ->user()
                    ->companies()
                    ->orderBy('name')
                    ->pluck('name', 'id')
                    ->prepend('All Companies', '');

        return view('contacts.edit', compact('companies', 'contact'));
    }

    /**
     * @param Contact $contact
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Contact $contact, Request $request): RedirectResponse
    {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email',
            'address'       => 'required',
            'company_id'    => 'required|exists:companies,id'
        ]);

        $contact->update($request->all());

        return redirect()
                ->route('contacts.index')
                ->with('message', 'Contact has been updated successfully');

    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
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
