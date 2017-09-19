<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;
use App\Http\Requests\storeProviderRequest;
use App\Http\Requests\updateProviderRequest;

class ProviderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only('index', 'store', 'update', 'delete');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::latest()->paginate(10);

        return $this->makeResponse('providers/manageProviders', compact('providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeProviderRequest $request)
    {
        $provider = Provider::create($request->all());
        return $this->respondWithMessage('Provider Created Successfully!', $provider);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view('providers/providerProfile', compact('provider'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(updateProviderRequest $request, Provider $provider)
    {
        $provider->update($request->all());
        return $this->respondWithMessage('Provider updated!!', $provider);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return ['message' => 'Provider Deleted Successfully'];
    }
}
