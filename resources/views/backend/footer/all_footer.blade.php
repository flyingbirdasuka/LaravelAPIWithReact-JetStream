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
                        <h4 class="card-title">All Footer Content</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th><strong>ADDRESS</strong></th>
                                        <th><strong>EMAIL</strong></th>
                                        <th><strong>PHONE</strong></th>
                                        <th><strong>LINKEDIN</strong></th>
                                        <th><strong>GITHUB</strong></th>
                                        <th><strong>FOOTER CREDIT</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($result as $item)
                                    <tr>
                                        <td>{{ $item->address}}</td>
                                        <td>{{ $item->email}}</td>
                                        <td>{{ $item->phone}}</td>
                                        <td>{{ $item->linkedin}}</td>
                                        <td>{{ $item->github}}</td>
                                        <td>{{ $item->footer_credit}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <div class="d-flex">
                                                    <a href="{{route('footer.edit', $item->id)}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('footer.delete', $item->id)}}" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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