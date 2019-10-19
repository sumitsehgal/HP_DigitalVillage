@extends('layouts.admin')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Student</h1>
            </div><!-- /.col -->
            
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<div class="content">
    <div class="container-fluid">



    <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Student</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form role="form" method="post" action="/students/{{$student->id}}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                @include('students.partials.form')

                  <button type="submit" class="btn btn-info">Save</button>
                


                </form>
              </div>
              <!-- /.card-body -->



            </div>
            <!-- /.card -->
            <!-- general form elements disabled -->
            
          </div>
    </div>
</div>

@endsection
