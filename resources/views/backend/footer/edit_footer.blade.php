@include('admin.head')
@include('admin.header')
@include('admin.sidebar')

<div class="content-body" style="min-height: 935px;">
    <div class="container-fluid">
        <div class="modal fade" id="addProjectSidebar">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Project</h5>
                        <button type="button" class="close" data-dismiss="modal"><span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
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
                        <h4 class="card-title">Update Footer</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{route('footer.update', $footer->id)}}" >
                                @csrf
                                <div class="form-group">
                                    <label class="info-title">Address</label>
                                    <input class="form-control" name="address" id="address" type="text" value="{{$footer->address}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Email</label>
                                    <input class="form-control" name="email" id="email" type="email" value="{{$footer->email}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Phone</label>
                                    <input class="form-control" name="phone" id="phone" type="text" value="{{$footer->phone}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Facebook</label>
                                    <input class="form-control" name="facebook" id="facebook" type="text" value="{{$footer->facebook}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Instagram</label>
                                    <input class="form-control" name="instagram" id="instagram" type="text" value="{{$footer->instagram}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Youtube</label>
                                    <input class="form-control" name="youtube" id="youtube" type="text" value="{{$footer->youtube}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Footer Credit</label>
                                    <input class="form-control" name="footer_credit" id="footer_credit" type="text" value="{{$footer->footer_credit}}">
                                </div>
                                
                                <input type="submit" class="btn btn-success" value="Update Footer">
                            </form>
                        </div>
                    </div>
                </div>
            </div>             
        </div>
    </div>
</div>
       

@include('admin.footer')