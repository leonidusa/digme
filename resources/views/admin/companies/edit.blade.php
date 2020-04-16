@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading" style="display: flex;justify-content:space-between">
                    <b>Edit company</b>
                    @if ($company->logo)
                    <img src="{{asset('storage/'.$company->logo)}}" alt="logo" style="width:100px">
                    @else
                    <div style="padding:10px; border:1px dotted #333">
                        Logo missing
                    </div>
                    @endif
                </div>
                <div class="panel-body">
                    <form action="{{ route('company.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   
                        <div class="input-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Company name" value="{{old('name') ?? $company->name}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Company email" value="{{old('email') ?? $company->email}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('website') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="website">Website</label>
                            <input type="text" name="website" id="website" class="form-control" placeholder="URL" value="{{$company->website}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="logo">Logo</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>
                        <br>
                            
                        <div class="input-group">
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-success">Save changes</button>
                                <a class="btn btn-danger" href="{{route('company.show', $company->id)}}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
