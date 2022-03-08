@extends('layouts.dashboard')

@section('title')
    Lapakcode
@endsection

@section('content')
<!-- Section Content -->
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
    <div class="dashboard-heading">
    <h2 class="dashboard-title">Dashboard</h2>
    <p class="dashboard-subtitle">
        Lihat pendapatanmu hari ini!!
    </p>
    </div>
    <div class="dashboard-content">
    <div class="row">
        <div class="col-md-4">
        <div class="card mb-2">
            <div class="card-body">
            <div class="dashboard-card-title">
                Verifikasi
            </div>
            <div class="dashboard-card-subtitle">
                {{ Auth::user()->store_status }}
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card mb-2">
            <div class="card-body">
            <div class="dashboard-card-title">
                Pendapatan
            </div>
            <div class="dashboard-card-subtitle">
                Rp. {{ number_format($revenue) }} ,-
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card mb-2">
            <div class="card-body">
            <div class="dashboard-card-title">
                Transaksi
            </div>
            <div class="dashboard-card-subtitle">
                {{ number_format($transaction_count) }}
            </div>
            </div>
        </div>
        </div>
        <?php if ( Auth::user()->store_status  == 'Tutup') {?>
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-body">
                <div class="dashboard-card-subtitle text-center">
                    <a
                        href="{{ route('dashboard-settings-account') }}"
                        class="list-group-item list-group-item-action bg-danger text-white text-lg {{ (request()->is('dashboard/account*')) ? 'active' : '' }} "
                        >
                    Verifikasi Untuk Buka Toko
                    </a>
                </div>
                </div>
            </div>
        </div>
        <?php };?>
    </div>
    <div class="row mt-3">
        <div class="col-12 mt-2">
            <h5 class="mb-3">Transaksi terkini</h5>
            @foreach ($transaction_data as $transaction)
              <a
                href="{{ route('dashboard-transaction-details', $transaction->id) }}"
                class="card card-list d-block"
                >
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1">
                            <img
                                src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                                class="w-75"
                            />
                        </div>
                        <div class="col-md-4">
                                {{ $transaction->product->name ?? '' }}
                            </div>
                            <div class="col-md-3">
                                {{ $transaction->transaction->user->name ?? '' }}
                            </div>
                            <div class="col-md-3">
                                {{  $transaction->created_at ?? '' }}
                            </div>
                            <div class="col-md-1 d-none d-md-block">
                                <img
                                    src="/images/dashboard-arrow-right.svg"
                                    alt=""
                                />
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    </div>
</div>
</div>
@endsection
