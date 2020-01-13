@extends('admin.dashboard')

@section('content')
<div class="container">
    <table class="table table-light table-striped table-bordered" id="mytable">
       <thead>
         <th>#</th>
        <th>University</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Update</th>
        <th>Delete</th>
       </thead>
       <tbody>
       <?php
         $no = 1;
       ?>
       @foreach($universities as $university)
        <tr>
        <td>{{$no}}</td>
        <td>{{$university->name}}</td>
        <td>{{$university->phone}}</td>
        <td>{{$university->email}}</td>
        <td><a href="{{route('updateform',$university->id)}}"><i class="fas fa-edit "></i></a></td>
        <td><a href="{{route('delete',$university->id)}}"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></td>
        </tr>
        <?php
         $no ++;
       ?>
       @endforeach
       </tbody>
       <tfoot>
       <th>#</th>
       <th>University</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Update</th>
        <th>Delete</th>
       </tfoot>
    </table>
</div>
@endsection
