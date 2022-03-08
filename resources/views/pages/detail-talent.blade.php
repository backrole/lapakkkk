@extends('layouts.app')

@section('title')
    {{ $users->name }}
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-home">
      <section class="store-new-products" style=" border-radius:25px;">
        <div class="container">
          <div class="row ">
            <div class="col-md-8 col-lg-3 pb-4 m-2" style="background-color:#fafafa; border-radius:25px;" data-aos="fade-up">
                <div class="p-2 text-center">
                    <div class="component-products d-block pt-3">
                        <div class="products-thumbnail">
                            <div
                            class="products-image "
                            style="background-image: '/images/icon-user.png';"
                            ></div>
                        </div>
                    </div>
                    <h5>{{$users->name}}</h5>
                </div>
                <div>
                    <img src="https://img.icons8.com/color/24/000000/filled-sent.png"/>
                    {{$users->email}}
                </div>
                <div class="pt-2">
                    <img src="https://img.icons8.com/color/24/000000/incoming-call--v2.png"/>
                    {{$users->phone_number}}
                </div>
                <div class="pt-2">
                    <img src="https://img.icons8.com/external-inipagistudio-mixed-inipagistudio/24/000000/external-campus-university-campus-inipagistudio-mixed-inipagistudio.png"/>
                    {{$users->address_two}}
                </div>
                <div class="row">
                  <div class="col mt-2">
                    <a class="btn btn-danger m-2" href="#" role="button"> Download CV</a>
                    <a class="btn btn-warning m-2" href="#" role="button"> Download Portofolio</a>
                  </div>
              </div>
            </div>
            <div class="col-md-8 col-lg-8 pb-4 m-2" style="background-color:#fafafa; border-radius:25px;" data-aos="fade-up">
                <div class="p-2">
                    <div class="component-products d-block pt-3">
                        <div class="col-8 pt-3">
                            <div class="row pl-2">
                                {!! $users->skill !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-12 pt-3">
            <h5 style="border-left: black solid;">&nbsp Produk Mahasiswa</h5>
          <div class="row">
            @php $incrementProduct = 0 @endphp
            @forelse ($products as $product)
                <div
                    class="col-6 col-md-3 col-lg-3 mt-2"
                    data-aos="fade-up"
                    data-aos-delay="{{ $incrementProduct+= 100 }}"
                >
                    <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                        <div class="products-thumbnail">
                            <div
                            class="products-image"
                            style="
                                   @if($product->galleries)
                                            background-image: url('{{ Storage::url($product->galleries->first()->photos) }}');
                                        @else
                                            background-color: #eee;
                                        @endif

                            "
                            ></div>
                        </div>
                        <div class="products-text text-center">
                            {{ $product->name }}
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
</div>
        </div>
      </section>
    </div>
@endsection
