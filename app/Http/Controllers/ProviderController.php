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
        $this->middleware('admin')->only('manage', 'index', 'create', 'store');
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
        $this->authorize('create', Provider::class);
        $provider = Provider::create($request->all());
        return response()->json($provider);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view('providers/providerProfile', conmpact('provider'));
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
        return response()->json($provider);
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
        return response()->json(['Provider Deleted Successfully']);
    }
}
