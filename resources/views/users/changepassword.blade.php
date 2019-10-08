@extends('layouts.admin')

@section('content')



<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Change Password</h1>
            </div><!-- /.col -->
            
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>


<div class="content">
    <div class="container-fluid">
        <div class="col-md-3">
        
        </div>

        <div class="col-md-6">

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Change Password</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form role="form" method="post" action="/storepassword">
                @csrf

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" />
                            <p style="color:red;font-weight:bold;">@error('password') {{$message}}  @enderror</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" />
                        </div>
                    </div>
                </div>
                
                  <button type="submit" class="btn btn-info">Change Password</button>
                


                </form>
            </div>

        </div>

        <div class="col-md-3">

        </div>
    </div>
</div>


@endsection