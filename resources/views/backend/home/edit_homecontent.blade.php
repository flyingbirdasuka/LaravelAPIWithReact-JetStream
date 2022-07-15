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
                        <h4 class="card-title">Update Home Content</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{route('homecontent.update', $homecontent->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label class="info-title">Home Title</label>
                                    <input class="form-control" name="home_title" id="home_title" type="text" value="{{$homecontent->home_title}}">
                                    @error('home_title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Home Subtitle</label>
                                    <input class="form-control" name="home_subtitle" id="home_subtitle" type="text" value="{{$homecontent->home_subtitle}}">
                                    @error('home_subtitle')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Tech Description</label>
                                    <textarea class="form-control" name="tech_description" rows="4" id="summernote">{{$homecontent->tech_description}}</textarea>
                                </div>
                                <input type="submit" class="btn btn-success" value="Update Home Content">
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
        </div>            
    </div>
</div>
       <!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: 400
    });
</script>
@include('admin.footer')