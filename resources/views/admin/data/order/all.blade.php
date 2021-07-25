@extends('admin.layouts.app')
@section('title', 'Data Order')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Insert new order</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.order.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <select name="user_id" class="custom-select">
                                            <option value="" selected disabled>Pilih User</option>
                                            @foreach ($user as $user)
                                                <option value="{{ $user->id }}">
                                                    {{ $user->email }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Laptop Name</label>
                                        <select id="laptop" name="laptop_id" class="custom-select" onclick="calculate()">
                                            <option value="" selected disabled>Pilih Laptop</option>
                                            @foreach ($laptop as $laptop)
                                                @if ($laptop->status == 'Ready'){
                                                    <option harga="{{ $laptop->brand->price }}"
                                                        value="{{ $laptop->id }}">
                                                        {{ $laptop->brand->name }}</option>}
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <select name="kota" class="custom-select">
                                            <option value="Central Jakarta">Central Jakarta</option>
                                            <option value="East Jakarta">East Jakarta</option>
                                            <option value="North Jakarta">North Jakarta</option>
                                            <option value="South Jakarta">South Jakarta</option>
                                            <option value="West Jakarta">West Jakarta</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Laptop Price</label>
                                        <input type="text" class="form-control" name="price" id="price" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input type="number" class="form-control" name="duration" id="duration"
                                            onkeyup="calculate()">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="number" class="form-control" name="kode_pos">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Total Price</label>
                                        <input type="text" class="form-control" name="total_price" id="total_price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Pickup Date</label>
                                        <input type="date" class="form-control" name="pickup_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <input type="hidden" class="form-control" name="status" value="On Process">
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-12">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Data Order</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="history" class="display">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Phone</th>
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
                                    <th>Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->user->email }}</td>
                                        <td>{{ $data->user->phone }}</td>
                                        <td>{{ $data->laptop->brand->name ?? '' }} ({{ $data->laptop->id ?? '' }})
                                        </td>
                                        <td>{{ $data->kota }}</td>
                                        <td>{{ $data->kecamatan }}</td>
                                        <td>{{ $data->kode_pos }}</td>
                                        <td>{{ $data->alamat }}</td>
                                        <td>{{ $data->duration }}</td>
                                        <td>@currency($data->total_price)</td>
                                        <td>{{ $data->pickup_date }}</td>
                                        <td>{{ $data->status }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>
                                            <!-- Call to action buttons -->
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item">
                                                    <a href="{{ route('admin.order.edit', $data->id) }}"
                                                        class="btn btn-success btn-sm rounded-0" type="button"
                                                        data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                            class="fa fa-edit"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <form class="delete"
                                                        action="{{ route('admin.order.destroy', $data->id) }}"
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

    <script>
        $(document).ready(function() {
            $('#history').DataTable({
                "order": [0, 'desc']
            });
        });
        var usedNames = {};
        $("select[name='laptop_id'] > option").each(function() {
            if (usedNames[this.text]) {
                $(this).remove();
            } else {
                usedNames[this.text] = this.value;
            }
        });

        function notEmpty() {
            var e = document.getElementById("laptop");
            var price = e.options[e.selectedIndex].getAttribute('harga');
            document.getElementById('price').value = price;

        }
        notEmpty()
        document.getElementById("laptop").onchange = notEmpty;

        function calculate(price) {
            var price = document.getElementById("price").value;
            var duration = document.getElementById("duration").value;
            var result = parseInt(price * duration);
            document.getElementById("total_price").value = result;
        }
    </script>
    <script>
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).data('type');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then(function(value) {
                if (!value = 1) {
                    $('.delete').submit();
                }
            });
        });
    </script>
    @include('sweetalert::alert')
@endsection
