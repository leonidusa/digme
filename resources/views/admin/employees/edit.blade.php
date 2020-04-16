@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            <div class="panel panel-default">
                <div class="panel-heading" style="display: flex;justify-content:space-between">
                    <b>Edit employee</b>
                    @if ($employee->avatar)
                    <div class="avatar" style="background-image: url('{{asset('storage/'.$employee->avatar)}}');"></div>
                    @else
                    <div style="padding:10px; border:1px dotted #333">
                        Avatar missing
                    </div>
                    @endif
                </div>
                <div class="panel-body">
                    <form action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   
                        <div class="input-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="first_name">First name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" value="{{old('first_name') ?? $employee->first_name}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="last_name">Last name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" value="{{old('last_name') ?? $employee->last_name}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="email" value="{{old('email') ?? $employee->email}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="{{$employee->phone}}">
                        </div>
                        <br>

                        <div class="input-group {{ $errors->has('avatar') ? 'has-error' : '' }}">
                            <label class="input-group-addon" for="avatar">Avatar</label>
                            <input type="file" name="avatar" id="avatar" class="form-control">
                        </div>
                        <br>
                            
                        <div class="input-group">
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-success">Save changes</button>
                                <a class="btn btn-danger" href="{{route('employee.show', $employee->id)}}">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
