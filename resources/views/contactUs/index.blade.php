@extends('template.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="mb-0">Alamat</h2>
                    </div>
                    <div class="card-body">
                        <p>Jl. Abdullah Bin Nuh, Kota Cianjur</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="mb-0">Google Maps Lokasi Kantor</h2>
                    </div>
                    <div class="card-body">
                        <!-- Tambahkan kode Google Maps di sini -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1dxxxxxxxxxxxx!2dxxxxxxxxxxxx!3dxxxxxxxxxxxx!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zxxxxxxxxxxxx!5e0!3m2!1sen!2sid!4v1631692212347!5m2!1sen!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2 class="mb-0">Foto Kantor</h2>
                    </div>
                    <div class="card-body">
                        <img src="{{ asset('img/gedungkantor.jpg') }}" alt="Foto Kantor" class="img-fluid">
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Form Pertanyaan</h2>
                    </div>
                    <div class="card-body">
                        <!-- Tambahkan form pertanyaan di sini -->
                        <form action="{{ route('sendQuestion') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="pertanyaan">Pertanyaan</label>
                                <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- <img src="{{ asset('img/gedungkantor.jpg') }}" alt="Deskripsi Foto" class=""> --}}