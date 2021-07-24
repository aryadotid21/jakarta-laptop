@extends('admin.layouts.app')
@section('title', 'Data Semua User')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Data Semua User</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="history" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->role->role }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>
                                            <!-- Call to action buttons -->
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a class="btn btn-success btn-sm rounded-0" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                            class="fa fa-edit"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <form action="{{ route('admin.user.destroy', $data->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm rounded-0" type="button"
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
@endsection
