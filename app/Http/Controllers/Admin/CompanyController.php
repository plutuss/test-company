<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $companies = Company::paginate(30);
        return view('admin.company.index', compact('companies'));
    }


    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.company.create');
    }


    /**
     * @param  StoreCompanyRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreCompanyRequest $request): RedirectResponse
    {
        Company::query()->create($request->validated());

        return back()->with([
            'msg'=> 'Ok, company created'
        ]);
    }


    /**
     * @param  Company  $company
     * @return Application|Factory|View
     */
    public function show(Company $company)
    {
        $clients =  $company->сlients()->paginate(30);

        return view('admin.client.index', compact('clients'));
    }


    /**
     * @param  Company  $company
     * @return Application|Factory|View
     */
    public function edit(Company $company)
    {
        return view('admin.company.update', compact('company'));
    }


    /**
     * @param  UpdateCompanyRequest  $request
     * @param  Company  $company
     * @return RedirectResponse
     */
    public function update(UpdateCompanyRequest $request, Company $company): RedirectResponse
    {
        $company->update($request->validated());

        return back()->with([
            'msg'=> 'Ok, company updated'
        ]);
    }


    /**
     * @param  Company  $company
     * @return RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();

        return back()->with([
            'msg' => 'Ok, company delete'
        ]);
    }
}
