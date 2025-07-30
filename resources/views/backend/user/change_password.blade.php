@include('admin.head')
@include('admin.header')
@include('admin.sidebar')

<div class="content-body" style="min-height: 935px;">
	<div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <p class="mb-0">Your React Dashboard</p>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">User Change Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{route('change.password.update')}}" >
                            	@csrf
                                <div class="form-group">
                                    <label class="info-title">Current Password</label>
                                    <input type="password" name="oldpassword" id="current_password"class="form-control input-default " >
                                </div>
                                <div class="form-group">
                                    <label class="info-title">New Password</label>
                                    <input type="password" name="password" id="assword"class="form-control input-default " >
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"class="form-control input-default " >
                                </div>
                                <input type="submit" class="btn btn-success" value="Change Password">
                            </form>
                        </div>
                    </div>
                </div>
			</div>			
        </div>
    </div>
</div>
       
@include('admin.footer')