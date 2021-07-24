@extends('admin.layouts.app')
@section('title', 'Data User')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Data User</h3>
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
                                    <th>On Process Order</th>
                                    <th>Finished Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data->where('role_id', 3) as $key => $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->phone }}</td>
                                        <td>{{ $data->order->count() }}</td>
                                        <td>{{ $data->order->where('status', 'Finished')->count() }}</td>
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
