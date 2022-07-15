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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Education Page</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>Title</strong></th>
                                        <th><strong>School Name</strong></th>
                                        <th><strong>Year</strong></th>
                                        <th><strong>Description</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($result as $item)
                                    <tr>
                                        <td>{{ $item->title}}</td>
                                        <td>{{ $item->schoolname}}</td>
                                        <td>{{ $item->year}}</td>
                                        <td>{{ Str::limit($item->description, 20, '...')}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <div class="d-flex">
                                                    <a href="{{route('education.edit', $item->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('education.delete', $item->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
       
@include('admin.footer')