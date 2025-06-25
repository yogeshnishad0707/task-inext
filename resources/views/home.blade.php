<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Home Page</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />

    <!-- top-files -->
    @include('inc/top-files')
    <!-- End Top files -->

    <style>
        .blink {
            animation: blink-animation 1s infinite;
        }

        @keyframes blink-animation {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>

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
            <x-alert></x-alert>
            <div class="container">
                <div class="page-inner" style="padding: 10px;">
                    <div class="row">
                        {{-- @if (isset($edit)) --}}
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="padding: 5px 15px;">
                                    <div class="card-title" style="color: #e67956;">Register User</div>
                                </div>
                                <div class="card-body">
                                    @if (isset($edit))
                                        <form action="{{ route('user.update', $edit->id) }}" method="POST"
                                            class='form-horizontal form-column form-bordered'
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                        @else
                                            <form action="{{ route('user.store') }}" method="POST"
                                                class='form-horizontal form-column form-bordered'
                                                enctype="multipart/form-data">
                                                @csrf
                                    @endif
                                    <div class="row" style="margin-top: -10px;">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="" class="form-label">First Name</label>
                                                <input type="test" name="firstname" class="form-control"
                                                    id="firstname" required maxlength="10"
                                                    value="@isset($edit){{ $edit->firstname }}@endisset"
                                                    placeholder="Enter Name" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="" class="form-label">Last Name</label>
                                                <input type="text" name="lastname" class="form-control"
                                                    id="lastname" maxlength="10"
                                                    value="@isset($edit){{ $edit->lastname }}@endisset" 
                                                    placeholder="Enter Last Name"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Date Of Birth</label>
                                                <input type="date" name="dob" class="form-control" id="dob"
                                                    value="@isset($edit){{ $edit->dob }}@endisset"
                                                    placeholder="Enter DOB" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" id="email"
                                                    value="@isset($edit){{ $edit->email }}@endisset" 
                                                    placeholder="Enter Email"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Phone Number</label>
                                                <input type="number" name="phone" class="form-control" maxlength="10"
                                                    oninput="javascript: if (this.value.length > this.maxLength)this.value = this.value.slice (0,this.maxLength);"
                                                    id="phone"
                                                    value="@isset($edit){{ $edit->phone }}@endisset"  placeholder="Enter Number"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Password</label>
                                                <input type="password" name="password" class="form-control"
                                                    id="password" placeholder="Enter Password"
                                                    value="@isset($edit){{ $edit->password }}@endisset" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Photo(Upload)</label>
                                                <input type="file" name="photo" class="form-control" id="photo"
                                                    />
                                                @isset($edit)
                                                    <img src="{{ asset('public/photoimage/' . $edit->photo) }}"
                                                        alt="Image" width="25%">
                                                @endisset
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-label">Address</label>
                                                <input type="text" name="address" class="form-control" id="address"
                                                    value="@isset($edit){{ $edit->address }}@endisset" placeholder="Enter Address"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <center>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                                <a href="{{ route('user.index') }}" class="btn btn-danger">Cancel</a>
                                            </center>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                {{-- @endif --}}
                                <div class="card-header card-action" style="padding: 5px 15px;">
                                    <div class="card-title" style="color: #e67956;">Register User List</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="datatables" class="display table table-striped table-hover ">
                                            <thead>
                                                <tr>
                                                    <th>SNo.</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Date Of Birth</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Photo</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $row)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $row->firstname }}</td>
                                                        <td>{{ $row->lastname }}</td>
                                                        <td>{{ $row->dob }}</td>
                                                        <td>
                                                            {{ $row->email }}
                                                        </td>
                                                        <td>{{ ucwords($row->phone) }}</td>
                                                        <td>
                                                            <img src="{{ asset('public/photoimage/' . $row->photo) }}"
                                                                alt="About Image" width="100%">
                                                        </td>
                                                        <td>
                                                            <div style="display: flex;">
                                                            <a href="{{ route('user.edit', $row->id) }}"
                                                                type="button" data-bs-toggle="tooltip"
                                                                title="" class="btn btn-link btn-primary btn-lg"
                                                                data-original-title="edit Task"> <i
                                                                    class="fa fa-edit"></i>
                                                            </a>
                                                            <form action="{{ route('user.destroy', $row->id) }}"
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
                </div>
            </div>

            <!-- Start Footer -->
            @include('inc/footer')
            <!-- End Footer -->

        </div>
    </div>

    <!-- Start Script -->

    <!-- End Script -->
    @include('inc/script')
</body>

</html>
