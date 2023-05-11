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
        $contacts = Contact::orderBy('id','DESC')->where(function($query){
            if($companyId = request('company_id')){
                $query->where('company_id',$companyId);
            }
        })->paginate(10);
        return view('contacts.index',['contacts'=>$contacts, 'companies'=>$companies]);
    }
    public function create(){
        $companies = Company::orderBy('name', 'ASC')->pluck('name','id')->prepend('All Companies','');
        return view('contacts.create',['companies'=>$companies]);
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
        return redirect()->route('contacts.index')->with('message','Contact added Successfully');
    }
    public function show($id){
        $contact = Contact::find($id);
        return view('contacts.show', ['contact'=> $contact]);
    }
}
