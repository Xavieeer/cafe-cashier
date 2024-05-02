@extends('template.layout')
@push('style')
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Jumlah Menu</div>
                        <h2 class="stat-digit">{{ $count_menu }}</h2>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success w-85" role="progressbar" aria-valuenow="85"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Pendapatan</div>
                        <h2>Rp. {{ $pendapatan }}</h2>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary w-75" role="progressbar" aria-valuenow="78"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Jumlah Transaksi yang masuk</div>
                        <h2 class="stat-digit">{{$jumlahTransaksiHariIni}}</h2>
                        <div class="text-muted">Tanggal Hari ini: {{\Carbon\Carbon::now()->format('d/m/Y')}}</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-warning w-50" role="progressbar" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                        <div class="stat-text">Task Completed</div>
                        <div class="stat-digit"> <i class="fa fa-usd"></i>650</div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger w-65" role="progressbar" aria-valuenow="65"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div> --}}
            <!-- /# card -->
        </div>
        <!-- /# column -->
    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Grafik Pendapatan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-8">
                            <div id="morris-bar-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="m-t-10">
                        <h4 class="card-title">Top 5 Penjualan</h4>
                    </div>
                    <div class="activity">
                        <!-- Aktivitas item 1 -->
                        @foreach ($menuTerlaris as $menu)
                        <div class="activity-item d-flex">
                            <div class="activity-photo">
                                <!-- Ganti foto_menu_1.jpg dengan URL gambar yang sesuai -->
                                <img src="{{ asset('storage/' . $menu->menu->image) }}" alt="Menu {{ $menu->menu->nama_menu}}" class="img-thumbnail" width="50">
                            </div>
                            <div class="activity-content ms-3" style="margin-left: 10px;">
                                <h5 class="fw-bold">{{ $menu->menu->nama_menu }}</h5>
                                <!-- Ganti 100 dengan jumlah yang sesuai -->
                                <div class="text-muted" style="margin-left: 10px;">Terjual:{{ $menu->total_jumlah }}</div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="m-t-10">
                        <h4 class="card-title">Stok Terendah</h4>
                    </div>
                    @foreach ($sisaStokTerkecil as $stok)
                            <div class="activity-item d-flex">
                                <div class="activity-photo">
                                    <img src="{{ asset('storage/' . $stok->menu->image) }}" alt="Menu {{ $menu->menu->nama_menu }}"
                                        class="img-thumbnail" width="50">
                                </div>
                                <div class="activity-content ms-3">
                                    <h5 class="fw-bold">{{ $stok->menu->nama_menu }}</h5>
                                    <h6 class="text-muted">Sisa Stok: {{ $stok->jumlah }}</h6>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        @endsection
