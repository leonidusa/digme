@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Add new company</b>
                </div>
                <div class="panel-body">
                    <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   
                        <div class="input-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Company name" value="{{old('name')}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Company email" value="{{old('email')}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('website') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="website">Website</label>
                            <input type="text" name="website" id="website" class="form-control" placeholder="URL" value="{{old('website')}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="logo">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control" value="{{old('file')}}">
                        </div>
                        <br>
                            
                        <div class="input-group">
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-success">Save</button>
                                <a class="btn btn-danger" href="{{route('company.index')}}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
