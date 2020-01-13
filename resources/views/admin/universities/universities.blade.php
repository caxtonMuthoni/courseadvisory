@extends('admin.dashboard')

@section('content')
<div class="container">
    <table class="table table-light table-striped table-bordered table-hover" id="mytable">
       <thead>
         <th>#</th>
        <th>University</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Likes</th>
        <th>Dislikes</th>
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
        <td>{{$university->likes}}</td>
        <td>{{$university->unlikes}}</td>
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
        <th>Likes</th>
        <th>Dislikes</th>
       </tfoot>
    </table>
</div>
@endsection
