@extends('technician.layouts.app')
@section('title', 'Check up laptop')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Edit data laptop</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('technician.laptop.update', $data->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Brand Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ $data->brand->name }}" readonly>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="number" class="form-control" name="price"
                                            value="{{ $data->brand->price }}" readonly>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="custom-select">
                                            <option @if ($data->status == 'Ready') selected @endif value="Ready">Ready
                                            </option>
                                            <option @if ($data->status == 'On Process') selected @endif value="On Process">On Process
                                            </option>
                                            <option @if ($data->status == 'Hold') selected @endif value="Hold">Hold
                                            </option>
                                            <option @if ($data->status == 'Finished') selected @endif value="Finished">Finished
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Note</label>
                                        <textarea name="note" class="form-control" rows="5">{{ $data->note }}</textarea>
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
