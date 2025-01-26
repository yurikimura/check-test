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
    $contact = $request->only(['name', 'email', 'gender', 'tel', 'address', 'building', 'categry_id', 'content']);
    return view('confirm', compact('contact'));
  }

  public function store(ContactRequest $request)
  {
    $contact = $request->only(['name', 'email', 'gender', 'tel', 'address', 'building', 'categry_id', 'content']);
    Contact::create($contact);
    return view('thanks');
  }

  public function admin()
  {
    return view('admin');
  }

  public function rules()
  {
    return [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255'],
      'gender' => ['required', 'string', 'gender'],
      'tel' => ['required', 'numeric', 'digits_between:10,11'],
      'address' => ['required', 'string', 'max:255'],
      'building' => ['nullable', 'string', 'max:255'],
      'categry_id' => ['required', 'string', 'max:255'],
      'content' => ['required', 'string', 'max:1000'],
    ];
  }
}
