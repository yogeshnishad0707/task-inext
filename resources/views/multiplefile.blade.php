<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>File Upload</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <!-- top-files -->
    @include('inc/top-files')
    <!-- End Top files -->
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        @include('inc/side-menu')
        <!-- End Sidebar -->
        <div class="main-panel">
            <!-- Start Header -->
            @include('inc/top-header')
            <!-- End Header -->
            <div class="container">
                <div class="page-inner" style="padding: 10px;">
                    {{-- <div class="page-header" style="margin-bottom: 0px;"> --}}
                    <div class="row">
                        {{-- @if (isset($edit)) --}}
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header" style="padding: 5px 15px;">
                                        <div class="card-title" style="color: #e67956;">Multiple File Upload</div>
                                    </div>
                                    <x-alert></x-alert>
                                    <div class="card-body">
                                        @if (isset($edit))
                                            <form action="{{ route('upload.update', $edit->id) }}" method="POST"
                                                class='form-horizontal form-column form-bordered'
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                            @else
                                                <form action="{{ route('upload.store') }}" method="POST"
                                                    class='form-horizontal form-column form-bordered'
                                                    enctype="multipart/form-data">
                                                    @csrf
                                        @endif
                                        <div class="row" style="margin-top: -10px;">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Multiple File(Upload)</label>
                                                    <input type="file" name="upload[]" multiple class="form-control" required
                                                        id="upload" />
                                                    @isset($edit)
                                                        @php
                                                            $multipleImages = explode('|', $edit->upload);
                                                        @endphp
                                                        @foreach ($multipleImages as $image)
                                                            <img src="{{ asset('public/multipleimage/' . $image) }}" alt="upload file" width="12%">
                                                        @endforeach
                                                    @endisset
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <center>
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                    <a href="{{ route('upload.index') }}" class="btn btn-danger">Cancel</a>
                                                </center>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                        {{-- @endif --}}
                        <div class="card-header card-action" style="padding: 5px 15px;">
                            <div class="card-title" style="color: #e67956;">Multiple File Details</div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatables" class="display table table-striped table-hover ">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($uploads as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @php
                                                        $multipleImages = explode('|', $row->upload);
                                                    @endphp
                                                    @foreach ($multipleImages as $image)
                                                        <img src="{{ asset('public/multipleimage/' . $image) }}" alt="upload file" width="12%">
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div style="display: flex;">
                                                        <a href="{{ route('upload.edit', $row->id) }}"
                                                            type="button" data-bs-toggle="tooltip" title=""
                                                            class="btn btn-link btn-primary btn-lg"
                                                            data-original-title="Edit Task"> <i class="fa fa-edit"></i>
                                                        </a>
                                                        <form action="{{ route('upload.destroy', $row->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button style="margin-top: 6px;margin-inline:-10px;"
                                                                type="submit" class="btn btn-link btn-danger"
                                                                onclick="return confirm('Are You Sure To Deleted!!')"><i
                                                                    class="fa fa-times"></i></button>
                                                        </form>
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
            {{-- </div> --}}
        </div>
        <!-- Start Footer -->
        @include('inc/footer')
        <!-- End Footer -->
    </div>
    </div>
    @include('inc/script')
    {{-- Text Editor --}}

</body>

</html>

