@extends('layouts.master')



@section('content')
<div class="page-container" style="margin-left:250px; margin-top: -700px;">

 <div class="row">
 <div class="col-md-12">

<table class="table">
        <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>E-Mail</th>
        <th>scrum master</th>
        <th>employee</th>
        <th>Action</th>
        </thead>

        <tbody>
        @foreach($users as $user)
           <tr>
                <form action="{{ route('admin/assign') }}" method="post">
                    <td>{{ $user->f_name }}</td>
                    <td>{{ $user->l_name }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                    <td><input type="checkbox" name="scrum_master" {{ $user->hasRole('scrum master') ? 'checked' : '' }}></td>
                    <td><input type="checkbox" name="employee" {{ $user->hasRole('employee') ? 'checked' : '' }}></td>
                    {{ csrf_field() }}
                    <td>
                        <button type="submit">Assign Roles</button>
                    </td>
                </form>
           </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    </div>
</div>

@stop