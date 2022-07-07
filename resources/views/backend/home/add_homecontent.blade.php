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
                        <h4 class="card-title">Add Home Content</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{route('homecontent.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title">Home Title</label>
                                    <input class="form-control" name="home_title" id="home_title" type="text">
                                    @error('home_title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Home Subtitle</label>
                                    <input class="form-control" name="home_subtitle" id="home_subtitle" type="text">
                                    @error('home_subtitle')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Tech Description</label>
                                    <textarea class="form-control" name="tech_description" rows="4" id="comment"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Total Student</label>
                                    <input class="form-control" name="total_student" id="total_student" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Total Course</label>
                                    <input class="form-control" name="total_course" id="total_course" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Total Review</label>
                                    <input class="form-control" name="total_review" id="total_review" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Video Description</label>
                                    <textarea class="form-control" name="video_description" id="video_description" rows="4" ></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Video URL</label>
                                    <input class="form-control" name="video_url" id="video_url" type="text">
                                </div>
                                <input type="submit" class="btn btn-success" value="Add Home Content">
                            </form>
                        </div>
                    </div>
                </div>
            </div>           
        </div>
    </div>
</div>

@include('admin.footer')