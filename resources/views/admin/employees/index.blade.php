@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading" style="display: flex;justify-content:space-between">
                    <b>Employee list</b>
                    <a title="company create" class="btn btn-success btn-xs" href="{{route('employee.create')}}">Add new</a>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Company</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Avatar</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                            <tr>
                                <th scope="row">{{$employee->id}}</th>
                                <td><a title="company details" href="{{route('company.show', $employee->company->id)}}">{{$employee->company->name}}</a></td>
                                <td>{{$employee->first_name}}</td>
                                <td>{{$employee->last_name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->phone}}</td>
                                <td>
                                    @if ($employee->avatar)
                                        <div class="avatar" style="background-image: url('{{asset('storage/'.$employee->avatar)}}');"></div>
                                    @endif
                                </td>
                                <td>
                                    <a title="employee details" class="btn btn-info btn-xs" href="{{route('employee.show', $employee->id)}}">Details</a>
                                    <a title="employee edit" class="btn btn-link btn-xs" href="{{route('employee.edit', $employee->id)}}">Edit</a>
                                    <form method="POST" action="{{route('employee.destroy', $employee->id)}}" style="display: inline;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-danger btn-xs" title="delete">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
