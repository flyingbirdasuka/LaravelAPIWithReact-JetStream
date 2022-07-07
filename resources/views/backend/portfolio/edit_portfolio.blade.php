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
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update portfolio</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{route('portfolio.update', $portfolio->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title">Short Title</label>
                                    <input class="form-control" name="short_title" id="short_title" type="text" value="{{$portfolio->short_title}}">
                                    @error('short_title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Short Description</label>
                                    <textarea class="form-control" name="short_description" rows="4" id="short_description">{{$portfolio->short_description}}</textarea>
                                    @error('short_description')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                 <div class="form-group">
                                    <label class="info-title">Long Title</label>
                                    <input class="form-control" name="long_title" id="long_title" type="text" value="{{$portfolio->long_title}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Long Description</label>
                                    <textarea class="form-control" name="long_description" rows="4" id="long_description">{{$portfolio->long_description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Total Duration</label>
                                    <input class="form-control" name="total_duration" id="total_duration" type="text" value="{{$portfolio->total_duration}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Total Lecture</label>
                                    <input class="form-control" name="total_lecture" id="otal_lecture" type="text" value="{{$portfolio->total_lecture}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Total Student</label>
                                    <input class="form-control" name="total_student" id="total_student" type="text" value="{{$portfolio->total_student}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Skill All</label>
                                    <input class="form-control" name="skill_all" id="skill_all" type="text" value="{{$portfolio->skill_all}}">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Video URL</label>
                                    <input class="form-control" name="video_url" id="video_url" type="text" value="{{$portfolio->video_url}}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload Small Image</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input id="image" name="small_img" type="file" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                    <div class="form-group">
                                    <img id="showImage" src="{{ asset($portfolio->small_img)}}" style="width:100px; height:100px;">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-success" value="Update portfolio">
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