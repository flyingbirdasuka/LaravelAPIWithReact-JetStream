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
                        <h4 class="card-title">Add Chart Content</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{route('chart.store')}}" >
                                @csrf
                               
                                <div class="form-group">
                                    <label class="info-title">Technology</label>
                                    <input class="form-control" name="technology" id="technology" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="info-title">Projects</label>
                                    <input class="form-control" name="projects" id="projects" type="text">
                                </div>
                                <input type="submit" class="btn btn-success" value="Add Chart Content">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
                                
        </div>
    </div>
</div>
       

@include('admin.footer')