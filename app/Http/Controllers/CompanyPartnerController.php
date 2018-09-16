<?php

namespace App\Http\Controllers;

use App\Company;
use App\Partner;
use Illuminate\Http\Request;

class CompanyPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insert into partners table
        $partner = new Partner;
        $partner->name = $request->name;
        $partner->email = $request->email;
        $partner->save();

        //insert into companies table
        $company = new Company;
        $company->logo = $request->logo;
        $company->website = $request->website;
        $company->save();

        $company->partner()->save($partner);

        return response()->json([
          'company' => $company,
          'partner' => $company->partner,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return response()->json([
          'company' => $company,
          'partner' => $company->partner(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
