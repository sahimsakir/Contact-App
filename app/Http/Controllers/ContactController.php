<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){

        $user = auth()->user();
        $companies = $user->companies()->orderBy('name', 'ASC')->pluck('name','id')->prepend('All Companies','');
        $contacts = $user->contacts()->latestFirst()->paginate(10);

        return view('contacts.index',['contacts'=>$contacts, 'companies'=>$companies]);

    }

    public function create(){

        $user = auth()->user();
        $contact = new Contact();
        $companies = $user->companies()->orderBy('name', 'ASC')->pluck('name','id')->prepend('All Companies','');

        return view('contacts.create',['contact'=>$contact, 'companies'=>$companies]);
    }

    public function store(Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:contacts',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $request->user()->contacts()->create($request->all());

        return redirect()->route('contacts.index')->with('message','Contact has been added Successfully');

    }

    public function show(Contact $contact){

        return view('contacts.show', ['contact'=> $contact]);
    }

    public function edit(Contact $contact){

        $user = auth()->user();

        $companies = $user->companies()->orderBy('name', 'ASC')->pluck('name','id')->prepend('All Companies','');

        return view('contacts.edit',['contact'=>$contact,'companies'=>$companies]);
    }

    public function update(Contact $contact, Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'company_id' => 'required|exists:companies,id',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message','Contact has been updated Successfully');
    }

    public function destroy(Contact $contact){

        $contact->delete();
        return back()->with('message','Contact has been deleted Successfully');

    }


}
