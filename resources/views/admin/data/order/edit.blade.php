@extends('admin.layouts.app')
@section('title', 'Data Order')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Edit data order</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.order.update', $data->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <select name="user_id" class="custom-select">
                                            <option value="" selected disabled>Pilih User</option>
                                            @foreach ($user as $user)
                                                <option value="{{ $user->id }}" @if ($data->user_id == $user->id) selected @endif>
                                                    {{ $user->email }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Laptop Name</label>
                                        <select id="laptop" name="laptop_id" class="custom-select" onclick="calculate()">
                                            <option value="" disabled>Pilih Laptop</option>
                                            @foreach ($laptop as $laptop)
                                                <option harga="{{ $laptop->brand->price }}" value="{{ $laptop->id }}"
                                                    @if ($data->laptop_id == $laptop->id) selected @endif>
                                                    {{ $laptop->brand->name }} ({{ $laptop->id }})</option>
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
                                            <option @if ($data->kota == 'Central Jakarta') selected @endif value="Central Jakarta">Central
                                                Jakarta</option>
                                            <option @if ($data->kota == 'East Jakarta') selected @endif value="East Jakarta">East Jakarta
                                            </option>
                                            <option @if ($data->kota == 'North Jakarta') selected @endif value="North Jakarta">North Jakarta
                                            </option>
                                            <option @if ($data->kota == 'South Jakarta') selected @endif value="South Jakarta">South Jakarta
                                            </option>
                                            <option @if ($data->kota == 'West Jakarta') selected @endif value="West Jakarta">West Jakarta
                                            </option>
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
                                        <input type="text" class="form-control" name="kecamatan"
                                            value="{{ $data->kecamatan }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Duration</label>
                                        <input type="number" class="form-control" name="duration" id="duration"
                                            onkeyup="calculate()" onchange="calculate()" value="{{ $data->duration }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Kode Pos</label>
                                        <input type="number" class="form-control" name="kode_pos"
                                            value="{{ $data->kode_pos }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Total Price</label>
                                        <input type="text" class="form-control" name="total_price" id="total_price"
                                            value="{{ $data->total_price }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Pickup Date</label>
                                        <input type="date" class="form-control" name="pickup_date"
                                            value="{{ $data->pickup_date }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="custom-select">
                                            <option @if ($data->status == 'On Process') selected @endif value="On Process">On Process
                                            </option>
                                            <option @if ($data->status == 'Pending') selected @endif value="Pending">Pending
                                            </option>
                                            <option @if ($data->status == 'Finished') selected @endif value="Finished">Finished
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea name="alamat" class="form-control"
                                            rows="5">{{ $data->alamat }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url()->previous() }}" type="submit" class="btn btn-warning">Back</a>
                        </div>
                    </form>
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
        // var usedNames = {};
        // $("select[name='laptop_id'] > option").each(function() {
        //     if (usedNames[this.text]) {
        //         $(this).remove();
        //     } else {
        //         usedNames[this.text] = this.value;
        //     }
        // });

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
