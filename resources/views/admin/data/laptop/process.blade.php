@extends('admin.layouts.app')
@section('title', 'Data Laptop On Process')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Insert new laptop</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.laptop.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label>Pilih Brand Laptop</label>
                                    <select name="brand_id" class="custom-select">
                                        <option value="" selected disabled>Pilih Brand</option>
                                        @foreach ($brand as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Stock</label>
                                        <input type="number" class="form-control" name="stock">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Data Laptop On Process</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="history" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Laptop</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                    <th>User</th>
                                    <th>Created At</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data->where('status','On Process') as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->brand->name }}</td>
                                        <td> @currency($data->brand->price) </td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->note }}</td>
                                        <td>
                                            {{ $data->user->name ?? '' }}
                                        </td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>
                                            <!-- Call to action buttons -->
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <form class="delete"
                                                        action="{{ route('admin.laptop.destroy', $data->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm rounded-0" type="submit"
                                                            data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Tidak Ada Data...</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>

    <script>
        $(document).ready(function() {
            $('#history').DataTable({
                // "order": []
            });
        });
    </script>
    @include('sweetalert::alert')
@endsection
