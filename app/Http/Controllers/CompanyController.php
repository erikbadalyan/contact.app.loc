<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the Companies.
     *
     * @return View
     */
    public function index(): View
    {
        $companies = request()
                        ->user()
                        ->companies()
                        ->with('contacts')
                        ->latest()
                        ->paginate(10);


        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new Company.
     *
     * @return View
     */
    public function create(): View
    {
        $company = new Company;

        return view('companies.create', compact('company'));
    }

    /**
     * Store a newly created company in companies table.
     *
     * @param  CompanyRequest  $request
     * @return RedirectResponse
     */
    public function store(CompanyRequest $request): RedirectResponse
    {
        $request->user()
                ->companies()
                ->create($request->all());

        return redirect()
                ->route('companies.index')
                ->with('message', "Company has been added successfully");
    }

    /**
     * Display the specified company.
     *
     * @param  Company  $company
     * @return View
     */
    public function show(Company $company): View
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param  Company  $company
     * @return View
     */
    public function edit(Company $company): View
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified company in companies table.
     *
     * @param  CompanyRequest  $request
     * @param  Company  $company
     * @return RedirectResponse
     */
    public function update(CompanyRequest $request, Company $company): RedirectResponse
    {
        $company->update($request->all());

        return redirect()
                ->route('companies.index')
                ->with('message', "Company has been updated successfully");
    }

    /**
     * Remove the specified company from companies table.
     *
     * @param  Company  $company
     * @return RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();

        return redirect()
                ->route('companies.index')
                ->with('message', 'Contact has been deleted successfully');
    }
}
