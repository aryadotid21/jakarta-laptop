@extends('technician.layouts.app')
@section('title', 'Data Laptop')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Data On Hold Laptop</h3>
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
                                @forelse($laptop->where('status','Hold')->where('user_id',Auth::user()->id) as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->brand->name ?? '' }}</td>
                                        <td> @currency($data->brand->price) </td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->note }}</td>
                                        <td>{{ $data->user->name ?? '' }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('technician.laptop.edit', $data->id) }}"
                                                        class="btn btn-success btn-sm rounded-0" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                            class="fa fa-edit"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
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
        <div class="row">
            <div class="col-12">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Data Finished Laptop</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="history2" class="display">
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
                                @php
                                    unset($data);
                                @endphp
                                @forelse($laptop->where('status','Finished')->where('user_id',NULL) as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->brand->name ?? '' }}</td>
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

                                                    <form method="POST"
                                                        action="{{ route('technician.addToHold', $data->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" class="btn btn-success btn-sm rounded-0"
                                                            type="button" data-toggle="tooltip" data-placement="top"
                                                            title="Add"><i class="fa fa-plus"></i></button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
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
        <div class="row">
            <div class="col-12">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Data Laptop</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="history3" class="display">
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
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    unset($data);
                                @endphp
                                @forelse($laptop as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->brand->name ?? '' }}</td>
                                        <td> @currency($data->brand->price) </td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->note }}</td>
                                        <td>{{ $data->user->name ?? '' }}</td>
                                        <td>{{ $data->created_at }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
                                        <td>Tidak Ada Data...</td>
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
            $('#history2').DataTable({
                // "order": []
            });
            $('#history3').DataTable({
                // "order": []
            });
        });
    </script>
    @include('sweetalert::alert')
@endsection
