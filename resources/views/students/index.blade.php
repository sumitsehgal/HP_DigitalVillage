@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">List of Students</h1>
            </div><!-- /.col -->
            
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<div class="content">
    <div class="container-fluid">

    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Students</h3>
                <h3 class="card-title" style="float:right;"><a href="/students/create" class="btn btn-primary">Add New</a></h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search"> -->

                    <div class="input-group-append">
                      <!-- <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button> -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" >
                <table class="table" style="font-size:0.93rem;">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Login ID</th>
                      <th>Phone</th>
                      <th>Status</th>
                      <th>Center Head</th>
                      <th colspan="3">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        @forelse($students as $student)
                            <tr  class="@if($student->is_active == 0) bg-danger @else tr-class  @endif " >
                                <td>{{ ($students->currentpage()-1) * $students->perpage() + $loop->index + 1 }}</td>    
                                <td>{{$student->name()}}</td>    
                                <td>{{$student->username}}</td>        
                                <td>{{$student->phone}}</td>    
                                <td>{{$student->getStatus()}}</td>   
                                <td>@if($student->parent) {{$student->parent->name()}} @endif</td>    
                                <td><a href="/students/{{$student->id}}/edit">Edit</a></td>    
                                <td>
                                  <a href="javascript:void(0);" class="delete-btn">Delete</a>
                                    <form action="/students/{{$student->id}}" method="post">
                                    @csrf
                                      @method('DELETE')
                                    </form>
                                </td>  
                                <td><a href="/user/{{$student->id}}/password">Change Password</a></td>    
                            <tr>
                        @empty
                            <tr>
                                <td colspan="11">No Student</td>
                            </tr>
                        @endforelse
                  </tbody>
                </table>
                <br/>
                {{ $students->links() }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

    </div>
</div>


@endsection