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
    <h2 class="dashboard-title">Withdraw</h2>
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
                Pendapatan
            </div>
            <div class="dashboard-card-subtitle">
                Rp. {{ number_format( $revenue ) }} ,-
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-4">
        <div class="card mb-2">
            <div class="card-body">
            <div class="dashboard-card-title">
                Ditarik
            </div>
            <div class="dashboard-card-subtitle text-danger">
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

    <form action="{{ route('dashboard-wd-store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
              <div class="card-body">
                   <label class="pb-3">Pengajuan Withdraw</label>
                <div class="row">
                    <div class="ml-4">Rp.</div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" class="form-control" name="wd"/>
                        <input type="hidden" name="status" value="Proses"/>
                        <input type="hidden" name="users_id" value="{{ Auth::user()->id }}"/>
                    </div>
                  </div>
                    <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      Pengajuan
                    </button>
                  </div>
                </div>
            </div>
          </form>

    </div>
<div class="row mt-3">
        <div class="col-12 mt-2">
            <h5 class="mb-3">Withdraw</h5>
            @foreach ($wd as $wds)
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                                {{ $wds->users_id ?? '' }}
                            </div>
                            <div class="col-md-3">
                                {{ $wds->wd ?? '' }}
                            </div>
                            <div class="col-md-3">
                                {{  $wds->status ?? '' }}
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection
