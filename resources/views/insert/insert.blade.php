@extends('layouts.header')
@section('title', 'Display Model')
@section('content')
<h2>Insert</h2>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if($tests->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Test Var</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tests as $test)
                <tr>
                    <td>{{ $test->id }}</td>
                    <td>{{ $test->test_var }}</td>
                    <td>{{ $test->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No records.</p>
@endif
@endsection
