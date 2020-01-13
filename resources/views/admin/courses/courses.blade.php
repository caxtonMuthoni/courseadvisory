@extends('admin.dashboard')

@section('content')
<div class="container">
    <table class="table table-light table-striped table-bordered table-hover" id="mytable">
       <thead>
         <th>#</th>
        <th>Course</th>
        <th>cluster</th>
        <th>Subjects</th>
        <th>universities</th>
        <th>Likes</th>
        <th>Dislikes</th>
       </thead>
       <tbody>
       <?php
         $no = 1;
       ?>
       @foreach($courses as $course)
        <tr>
        <td>{{$no}}</td>
        <td>{{$course->name}}</td>
        <td>{{$course->cluster}}</td>
        <td>{{$course->subjects}}</td>
        <td>
           @foreach($course->universities as $uni)

            <ul>{{$uni}}</ul>

           @endforeach
        
        </td>
        <td>{{$course->likes}}</td>
        <td>{{$course->unlikes}}</td>
        </tr>
        <?php
         $no ++;
       ?>
       @endforeach
       </tbody>
       <tfoot>
       <th>#</th>
       <th>Course</th>
        <th>cluster</th>
        <th>Subjects</th>
        <th>universities</th>
        <th>Likes</th>
        <th>Dislikes</th>
       </tfoot>
    </table>
</div>
@endsection
