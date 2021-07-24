@extends('admin.layouts.app');
@section('title', 'Data Laptop Ready');
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Laptop Ready</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="history" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Laptop</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Note</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data->where('status','Ready') as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td> @currency($data->price) </td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->note }}</td>
                                        <td>{{ $data->created_at }}</td>
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
