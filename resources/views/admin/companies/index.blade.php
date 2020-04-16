@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading" style="display: flex;justify-content:space-between">
                    <b>Company list</b>
                    <a title="company create" class="btn btn-success btn-xs" href="{{route('company.create')}}">Add new</a>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company name</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Logo</th>
                                <th>Employees</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                            <tr>
                                <th scope="row">{{$company->id}}</th>
                                <td>{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->website}}</td>
                                <td>
                                    @if ($company->logo)
                                        <img src="{{asset('storage/'.$company->logo)}}" alt="logo" style="width:100px">
                                    @endif
                                </td>
                                <td><span class="badge">{{count($company->employees)}}</span></td>
                                <td>
                                    <a title="company details" class="btn btn-info btn-xs" href="{{route('company.show', $company->id)}}">Details</a>
                                    <a title="company edit" class="btn btn-link btn-xs" href="{{route('company.edit', $company->id)}}">Edit</a>

                                    <form method="POST" action="{{route('company.destroy', $company->id)}}" style="display: inline;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger btn-xs" title="delete company">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
