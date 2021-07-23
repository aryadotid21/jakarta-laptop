@extends('layouts.app');

@section('content');
    <div class="container" style="margin-bottom:10%" data-aos="fade-up">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Order Form</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.order.proccess') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                <div class="col-md-6">
                                    <input type="hidden" name="user_id" class="form-control"
                                        value="{{ Auth::user()->id }}" readonly>
                                    <input type="text" name="nama" class="form-control" value="{{ Auth::user()->name }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control"
                                        value="{{ Auth::user()->email }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                <div class="col-md-6">
                                    <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}"
                                        readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="City" class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-6">
                                    <select name="kota" class="form-control">
                                        <option value="Central Jakarta">Central Jakarta</option>
                                        <option value="East Jakarta">East Jakarta</option>
                                        <option value="North Jakarta">North Jakarta</option>
                                        <option value="South Jakarta">South Jakarta</option>
                                        <option value="West Jakarta">West Jakarta</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kecamatan" class="col-md-4 col-form-label text-md-right">Kecamatan</label>

                                <div class="col-md-6">
                                    <input name="kecamatan" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kode_pos" class="col-md-4 col-form-label text-md-right">Kode Pos</label>

                                <div class="col-md-6">
                                    <input name="kode_pos" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>

                                <div class="col-md-6">
                                    <input name="alamat" type="text" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Laptop" class="col-md-4 col-form-label text-md-right">Laptop</label>

                                <div class="col-md-6">
                                    <select id="laptop" name="laptop" onclick="calculate()" class="form-control required">
                                        <option value="" selected disabled>Pilih Laptop</option>
                                        @foreach ($data_laptop as $laptops)
                                            @if ($laptops->status == 'Ready'){
                                                <option laptop_id="{{ $laptops->id }}" value="{{ $laptops->price }}">
                                                    {{ $laptops->name }}</option>}
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price/day" class="col-md-4 col-form-label text-md-right">Price For 1
                                    Day</label>

                                <div class="col-md-6">
                                    <input type="hidden" name="laptop_id" id="laptop_id" value="">
                                    <input type="text" class="form-control" name="dayprice" id="price" readonly value="">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Duration" onkeypress="calculate()"
                                    class="col-md-4 col-form-label text-md-right">Durasi</label>

                                <div class="col-md-6">
                                    <input name="duration" type="number" class="form-control" id="durasi"
                                        onkeyup="calculate()">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="total_price" class="col-md-4 col-form-label text-md-right">Total Price</label>

                                <div class="col-md-6">
                                    <input name="total_price" type="text" class="form-control" id="total_price" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Date" class="col-md-4 col-form-label text-md-right">Pickup Date</label>

                                <div class="col-md-6">
                                    <input name="pickup_date" class="form-control" type="date" value=""
                                        id="example-datetime-local-input">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Order Now
                                    </button>
                                    <a class="btn btn-secondary" href="{{ url()->previous() }}">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('scroll', (e) => {
            const nav = document.querySelector('.navbar');
            if (window.pageYOffset > 0) {
                nav.classList.add("add-shadow");
            } else {
                nav.classList.remove("add-shadow");
            }
        });

        var usedNames = {};
        $("select[name='laptop'] > option").each(function() {
            if (usedNames[this.text]) {
                $(this).remove();
            } else {
                usedNames[this.text] = this.value;
            }
        });


        function convertToRupiah(angka) {
            var rupiah = '';
            var angkarev = angka.toString().split('').reverse().join('');
            for (var i = 0; i < angkarev.length; i++)
                if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
            return 'Rp' + rupiah.split('', rupiah.length - 1).reverse().join('');
        }
        /**
         * Usage example:
         * alert(convertToRupiah(10000000)); -> "Rp. 10.000.000"
         */

        function convertToAngka(rupiah) {
            return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
        }
        /**
         * Usage example:
         * alert(convertToAngka("Rp 10.000.123")); -> 10000123
         */

        function notEmpty() {
            var e = document.getElementById("laptop");
            var Price = e.options[e.selectedIndex].value;
            var LaptopID = e.options[e.selectedIndex].getAttribute('laptop_id');
            document.getElementById('price').value = convertToRupiah(Price);
            document.getElementById('laptop_id').value = LaptopID;

        }
        notEmpty()
        document.getElementById("laptop").onchange = notEmpty;

        function calculate(price) {
            var price = convertToAngka(document.getElementById("price").value);
            var duration = document.getElementById("durasi").value;
            var result = parseInt(price * duration);
            document.getElementById("total_price").value = convertToRupiah(result);
        }

        AOS.init();
    </script>
@endsection
