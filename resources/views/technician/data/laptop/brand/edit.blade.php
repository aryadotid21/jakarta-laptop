@extends('admin.layouts.app')
@section('title', 'Data User')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Edit data user</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('admin.brand.update', $data->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Brand Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $data->name }}">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" class="form-control" name="price" value="{{ $data->price }}">
                                        </select>
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
