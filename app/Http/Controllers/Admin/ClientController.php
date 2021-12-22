<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $clients = Client::paginate(25);

        return view('admin.client.index', compact('clients'));
    }


    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.client.create');
    }


    /**
     * @param  StoreClientRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreClientRequest $request): RedirectResponse
    {
        Client::query()->create($request->validated());

        return back()->with([
            'msg' => 'Ok, client create'
        ]);
    }


    public function show(Client $client)
    {
        $companies = $client->companies()->paginate(25);

        return view('admin.company.index', compact('companies'));
    }


    /**
     * @param  Client  $client
     * @return Application|Factory|View
     */
    public function edit(Client $client)
    {
        return view('admin.client.update', compact('client'));
    }


    /**
     * @param  UpdateClientRequest  $request
     * @param  Client  $client
     * @return RedirectResponse
     */
    public function update(UpdateClientRequest $request, Client $client): RedirectResponse
    {
        $client->update($request->validated());

        return back()->with([
            'msg' => 'Ok, client updated'
        ]);
    }


    /**
     * @param  Client  $client
     * @return RedirectResponse
     */
    public function destroy(Client $client): RedirectResponse
    {
        $client->delete();

        return back()->with([
            'msg' => 'Ok, client delete'
        ]);
    }
}
