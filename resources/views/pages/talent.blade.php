@extends('layouts.app')

@section('title')
    Store Category Page
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-home">
      <section class="store-new-products">
        <div class="container">
            <div style="">

            </div>
          <div class="row">
            <div class="col-12" data-aos="fade-up">
              <h5>Toko Mahasiswa</h5>
            </div>
          </div>
          <div class="row">
            @php $incrementUser = 0 @endphp
            @forelse ($users as $user)
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementUser+= 100 }}">
                    <a href="{{ route('talents-detail', $user->store_name) }}" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div class="products-image"
                            style=" background-image: '/images/icon-user.png'; "
                            ></div>
                        </div>
                        <div class="products-text text-center">
                            {{ $user->name }}
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center py-5"
                    data-aos="fade-up"
                    data-aos-delay="100">
                        No Products Found
                </div>
            @endforelse
          </div>
        </div>
      </section>
    </div>
@endsection
