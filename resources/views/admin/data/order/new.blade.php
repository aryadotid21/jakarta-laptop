@extends('admin.layouts.app');
@section('title', 'Data New Order');
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data New Order</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="history" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Laptop</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kode Pos</th>
                                    <th>Alamat</th>
                                    <th>Duration</th>
                                    <th>Total Price</th>
                                    <th>Pickup Date</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data->whereNotIn('status', ['Finished']) as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->laptop->name }} ({{ $data->laptop->id }})</td>
                                        <td>{{ $data->kota }}</td>
                                        <td>{{ $data->kecamatan }}</td>
                                        <td>{{ $data->kode_pos }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->duration }}</td>
                                        <td>@currency($data->total_price)</td>
                                        <td>{{ $data->pickup_date }}</td>
                                        <td>{{ $data->status }}</td>
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
                "order": [0, 'desc']
            });
        });
    </script>
@endsection
