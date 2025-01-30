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
    // phone1, phone2, phone3 を連結して tel にする
    $tel = $request->input('phone1') . $request->input('phone2') . $request->input('phone3');
    // フォームデータを取得し、tel を追加
    $contact = $request->only(['last_name', 'first_name', 'email', 'gender', 'address', 'building', 'category_id', 'detail']);
    $contact['tel'] = $tel; // tel を追加

    return view('confirm', compact('contact'));
  }

  public function store(ContactRequest $request)
  {
    $contact = $request->only(['last_name', 'first_name', 'email', 'gender', 'address', 'building', 'category_id', 'detail', 'tel']);

    Contact::create($contact);
    return view('thanks');
  }

  public function admin()
  {
    $contacts = Contact::Paginate(10);
    return view('admin', ['contacts' => $contacts]);
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
