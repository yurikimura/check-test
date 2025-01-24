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
    $contact = $request->only(['name', 'email', 'tel', 'content']);
    return view('confirm', compact('contact'));
  }

  public function store(ContactRequest $request)
  {
    $contact = $request->only(['name', 'email', 'tel', 'content']);
    Contact::create($contact);
    return view('thanks');
  }

  public function rules()
  {
    return [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'tel' => ['required', 'numeric', 'digits_between:10,11'],
    ];
  }
}
