@extends('layouts.appadmin')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="admin__content">
  <div class="admin-form__heading">
    <h2>Admin</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Email</th>
          <th>Gender</th>
          <th>Tel</th>
          <th>Address</th>
          <th>Building</th>
          <th>Category ID</th>
          <th>Detail</th>
          <th>Created At</th>
          <th>Updated At</th>
        </tr>
      </thead>
      <tbody>
        @foreach($contacts as $contact)
        <tr>
          <td>{{ $contact->id }}</td>
          <td>{{ $contact->last_name }}</td>
          <td>{{ $contact->first_name }}</td>
          <td>{{ $contact->email }}</td>
          <td>{{ $contact->gender }}</td>
          <td>{{ $contact->tel }}</td>
          <td>{{ $contact->address }}</td>
          <td>{{ $contact->building }}</td>
          <td>{{ $contact->categry_id }}</td>
          <td>{{ $contact->detail }}</td>
          <td>{{ $contact->created_at }}</td>
          <td>{{ $contact->updated_at }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection