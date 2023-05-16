<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
        $companies = Company::orderBy('name', 'ASC')->pluck('name','id')->prepend('All Companies','');
        $contacts = Contact::latestFirst()->filter()->paginate(10);
        return view('contacts.index',['contacts'=>$contacts, 'companies'=>$companies]);
    }

    public function create(){
        $contact = new Contact();
        $companies = Company::orderBy('name', 'ASC')->pluck('name','id')->prepend('All Companies','');
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
        Contact::create($request->all());
        return redirect()->route('contacts.index')->with('message','Contact has been added Successfully');
    }

    public function show($id){
        $contact = Contact::findOrFail($id);
        return view('contacts.show', ['contact'=> $contact]);
    }

    public function edit($id){
        $contact = Contact::findOrFail($id);
        $companies = Company::orderBy('name', 'ASC')->pluck('name','id')->prepend('All Companies','');
        return view('contacts.edit',['contact'=>$contact,'companies'=>$companies]);
    }

    public function update($id, Request $request){
        $contact = Contact::findOrFail($id);
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

    public function destroy($id){
        $contact = Contact::findOrFail($id);
        $contact->delete($id);
        return back()->with('message','Contact has been deleted Successfully');
    }


}
