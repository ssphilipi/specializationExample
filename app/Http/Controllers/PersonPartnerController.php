<?php

namespace App\Http\Controllers;

use App\Person;
use App\Partner;
use Illuminate\Http\Request;

class PersonPartnerController extends Controller
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
        $partner->text = $request->text;
        $partner->save();
        //insert into persons table
        $person = new Person;
        $person->picture = $request->picture;
        $person->facebook = $request->facebook;
        $person->save();
        //creating the spcialization
        $person->partner()->save($partner);

        return response()->json([
          'person' => $person,
          'partner' => $person->partner,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        return response()->json([
          'person' => $person,
          'partner' => $person->partner(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
    }
}
