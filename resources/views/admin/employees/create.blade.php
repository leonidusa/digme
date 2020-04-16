@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Add new employee</b>
                </div>
                <div class="panel-body">
                    <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   
                        <div class="input-group {{ $errors->has('company_id') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="company_id">Company</label>
                            <select class="form-control" name="company_id" id="company_id">
                                <option value="" readonly>Select company</option>
                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="first_name">First name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" value="{{old('first_name')}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="last_name">Last name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" value="{{old('last_name')}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{old('email')}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="{{old('phone')}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="avatar">Avatar</label>
                            <input type="file" name="avatar" id="avatar" class="form-control">
                        </div>
                        <br>

                        <div class="input-group">
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a class="btn btn-danger" href="{{route('employee.index')}}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
