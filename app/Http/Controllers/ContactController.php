<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){

        $companies = Company::userCompanies();
        $contacts = auth()->user()->contacts()->latestFirst()->paginate(10);

        return view('contacts.index',['contacts'=>$contacts, 'companies'=>$companies]);

    }

    public function create(){

        $contact = new Contact();
        $companies = Company::userCompanies();

        return view('contacts.create',['contact'=>$contact, 'companies'=>$companies]);
    }

    public function store(ContactRequest $request){

        $request->user()->contacts()->create($request->all());

        return redirect()->route('contacts.index')->with('message','Contact has been added Successfully');

    }

    public function show(Contact $contact){

        return view('contacts.show', ['contact'=> $contact]);
    }

    public function edit(Contact $contact){

        $companies = Company::userCompanies();

        return view('contacts.edit',['contact'=>$contact,'companies'=>$companies]);
    }

    public function update(Contact $contact, ContactRequest $request){


        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message','Contact has been updated Successfully');
    }

    public function destroy(Contact $contact){

        $contact->delete();
        return back()->with('message','Contact has been deleted Successfully');

    }




}
