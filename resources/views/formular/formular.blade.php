@extends('layouts.header')
@section('title', 'Formular')
@section('content')
<h2>Formular</h2>
<form method="POST" action="{{ url('formular') }}">
    @csrf
    <div class="mb-3">
        <label for="firstname" class="form-label">Firstname:</label>
        <input type="text" name="firstname" id="firstname" class="form-control" value="{{ old('firstname') }}" required>
        @error('firstname')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Lastname:</label>
        <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') }}" required>
        @error('lastname')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', auth()->user()->email ?? '') }}" required>
        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Pghone:</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
        @error('phone')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        @error('description')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
</form>
<hr>
<h3>DB Colection</h3>
@if($formulars->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Description</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formulars as $form)
                <tr>
                    <td>{{ $form->firstname }}</td>
                    <td>{{ $form->lastname }}</td>
                    <td>{{ $form->email }}</td>
                    <td>{{ $form->phone ?? '-' }}</td>
                    <td>{{ $form->description ?? '-' }}</td>
                    <td>{{ $form->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No records.</p>
@endif
@endsection
