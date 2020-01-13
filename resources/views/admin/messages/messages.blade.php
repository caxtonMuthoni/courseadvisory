@extends('admin.dashboard')

@section('content')
<div class="container">
    <table class="table table-light table-striped table-bordered table-hover" id="mytable">
       <thead>
         <th>#</th>
        <th>FirstName</th>
        <th>PhoneNumber</th>
         <th>Email</th>
        <th>Message</th>
        <th>Reply</th>
       </thead>
       <tbody>
       <?php
         $no = 1;
       ?>
       @foreach($messages as $message)
        <tr>
        <td>{{$no}}</td>
        <td>{{$message->firstname}}</td>
        <td>{{$message->phone}}</td>
        <td>{{$message->email}}</td>
        <td>{{$message->message}}</td>
        <td><a href="{{route('replyform',$message->id)}}" class="btn btn-primary btn-small"><i class="fa fa-reply" aria-hidden="true"></i></a></td>
        </tr>
        <?php
         $no ++;
       ?>
       @endforeach
       </tbody>
       <tfoot>
       <th>#</th>
        <th>FirstName</th>
        <th>PhoneNumber</th>
        <th>Email</th>
        <th>Message</th>
        <th>Reply</th>
       </tfoot>
    </table>
</div>
@endsection
