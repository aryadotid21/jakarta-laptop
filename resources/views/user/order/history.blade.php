@extends('layouts.app');
@section('content');
    <style>
        .swal-height {
            height: 70vh;
        }

    </style>
    <div class="container" style="margin-bottom:10%" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark text-white">Order History</div>
                    <div class="card-body">
                        <table id="history" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Laptop</th>
                                    <th>Delivery To</th>
                                    <th>Duration</th>
                                    <th>Price / Day</th>
                                    <th>Total Price</th>
                                    <th>Pickup Date</th>
                                    <th>Order Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $key => $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->laptop->brand->name }}</td>
                                        <td><a href="#"
                                                onclick="address('{{ $data->kota }}','{{ $data->kecamatan }}','{{ $data->kode_pos }}','{{ $data->alamat }}');">{{ $data->kota }}</a>
                                        </td>
                                        <td>{{ $data->duration }} Hari</td>
                                        <td> @currency($data->laptop->brand->price)</td>
                                        <td> @currency($data->total_price)</td>
                                        <td>{{ $data->pickup_date }}</td>
                                        <td>{{ $data->created_at->format('m-d-Y') }}</td>
                                        <td><a href="#" onclick="status('{{ $data->status }}');">{{ $data->status }}
                                            </a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">Tidak Ada Data...</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.noConflict();
            $('#history').DataTable({
                // "order": []
            });
        });

        function address(kota, kecamatan, kode_pos, alamat) {
            Swal.fire({
                type: 'success',
                icon: 'info',
                title: "Kota : " + kota + "<br>" + "Kecamatan : " + kecamatan + "<br>" + "Kode Pos : " + kode_pos +
                    "<br>" +
                    "Alamat : " + alamat + "<br>",
                timer: 100000,
                customClass: 'swal-height'
            });
        }

        function status(status) {
            var info = "";
            var icon = "";
            if (status == "Pending") {
                info = "Pesanan sedang diperiksa oleh administrator";
                icon = "info";
            } else if (status == "On Process") {
                info = "Pesanan sedang diproses, periksa email anda " + "{{ Auth::user()->email }}" +
                    " untuk langkah selanjutnya";
                icon = "warning";
            } else {
                info = "Pesanan selesai"
                icon = "success";
            }

            Swal.fire({
                type: 'success',
                icon: icon,
                title: info,
                timer: 100000,
            });
        }
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(value) {
                if (value) {
                    Swal.fire(
                        'Deleted!',
                        'data has been deleted.',
                        'success'
                    )
                    window.location.href = url;
                }
            });
        });
    </script>
@endsection
