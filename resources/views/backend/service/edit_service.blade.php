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
                        <h4 class="card-title">Add Service</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{route('service.update',$service->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title">Service Name</label>
                                    <input class="form-control" name="service_name" id="service_name" type="text" value="     {{$service->service_name}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Service Description</label>
                                    <textarea class="form-control" name="service_description" rows="4" id="comment">     {{$service->service_description}}</textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input id="image" name="service_logo" type="file" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                    <div class="form-group">
                                    <img id="showImage" src="{{asset($service->service_logo)}}" style="width:100px; height:100px;">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success" value="Update Service">
                            </form>
                        </div>
                    </div>
                </div>
            </div>                
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@include('admin.footer')