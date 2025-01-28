<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function confirm(ContactRequest $request)
  {
    $contact = $request->only(['last_name', 'first_name', 'email', 'gender', 'tel', 'address', 'building', 'category_id', 'detail']);
    return view('confirm', compact('contact'));
  }

  public function store(ContactRequest $request)
  {
    $contact = $request->only(['last_name', 'first_name', 'email', 'gender', 'tel', 'address', 'building', 'category_id', 'detail']);
    Contact::create($contact);
    return view('thanks');
  }

  public function admin()
  {
    $contacts = Contact::all();
    return view('admin', compact('contacts'));
  }

  public function rules()
  {
    return [
      'category_id' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'first_name' => ['required', 'string', 'max:255'],
      'gender' => ['required', 'string', 'gender'],
      'email' => ['required', 'string', 'email', 'max:255'],
      'tel' => ['required', 'numeric', 'digits_between:10,11'],
      'address' => ['required', 'string', 'max:255'],
      'building' => ['nullable', 'string', 'max:255'],
      'detail' => ['required', 'string', 'max:1000'],
    ];
  }
}
