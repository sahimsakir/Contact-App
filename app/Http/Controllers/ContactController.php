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
        $contacts = Contact::orderBy('first_name','ASC')->where(function($query){
            if($companyId = request('company_id')){
                $query->where('company_id',$companyId);
            }
        })->paginate(10);
        return view('contacts.index',['contacts'=>$contacts, 'companies'=>$companies]);
    }
    public function create(){
        return view('contacts.create');
    }
    public function show($id){
        $contact = Contact::find($id);
        return view('contacts.show', ['contact'=> $contact]);
    }
}
