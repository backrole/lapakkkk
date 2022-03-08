@extends('layouts.app')

@section('title')
    Lapakcode | Jual Beli Produk Digital
@endsection

@section('content')
    <div class="page-content page-home">
        <div class="container-fluid" style="background-color: #28527A; height:500px;">
            <div class="row" style="margin-top: -25px;">
                <div class="col-lg-12">
                    <div style="background-color: #28527A;">
                        <div class="row pt-5" style="padding-bottom: 100px;">
                            <div class="col-lg-8 text-center pt-5">
                                    <h1 class="mb-4 text-white" >Jual Beli Produk Digital</h1>
                                    <p class="mb-4 text-white">
                                        Produk terbaik dari karya mahasiswa indonesia
                                    </p>
                                    <a href="{{  route('register') }}" class="btn btn-warning btn-rounded me-2" >Daftar</a>
                                    <a href="#" class="btn btn-link btn-rounded text-white" >Pelajari</a>
                            </div>
                            <div class="col-lg-4 d-none d-sm-block">
                                    <img src="{!! asset('/images/social-media-marketing.png') !!}" alt="Logo" style="width:250px;"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="card shadow bg-white text-center" style="background-color:#fff; margin-top: -60px;">
                        <div class="card-body p-2">
                            <div class="row">
                               <div class="col-12" data-aos="fade-up">

                                </div>
                            </div>
                            <div class="row">
                                @php $incrementCategory = 0 @endphp
                                @forelse ($categories as $category)
                                    <div
                                        class="col-2 col-lg-2 "
                                        data-aos="fade-up"
                                        data-aos-delay="{{ $incrementCategory+= 100 }}"
                                    >
                                        <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                                            <div class="categories-image">
                                                <img
                                                src="{{  Storage::url($category->photo) }}"
                                                alt=""
                                                class="w-100"
                                                />
                                            </div>
                                        </a>
                                    </div>
                                @empty
                                    <div
                                        class="col-12 text-center py-5"
                                        data-aos="fade-up"
                                        data-aos-delay="100"
                                    >
                                        No Categories Found
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="row">
                    <div class="col-12 text-center py-2 d-none d-sm-block">
                        <a href="https://click.accesstra.de/adv.php?rk=005ev60017x9" target="_blank">
                            <img src="https://imp.accesstra.de/img.php?rk=005ev60017x9" border="0"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <section class="store-new-products pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5 style="border-left: black solid;">&nbsp Produk Promo</h5>
                    </div>
                </div>
                <div class="row" >
                    @php $incrementProduct = 0 @endphp
                    @forelse ($products as $product)
                    <?php if( $product->diskon > 0 ) {
                                ?>
                        <div
                        class="col-6 col-md-4 col-lg-3"
                        data-aos="fade-up"
                        data-aos-delay="{{  $incrementProduct += 100 }}"
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
                                <div class="products-text">
                                    {{  $product->name }}
                                </div>
                                <div style="color:gray; size:10px;">
                                    By {{  $product->user->store_name }}
                                </div>

                                <div class="products-price">
                                    <span style="color:gray; size:10px; text-decoration: line-through red;">
                                        Rp. {{ number_format($product->price) }}
                                    </span><br>
                                    Rp. {{ number_format(($product->price)-($product->diskon)) }}
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    @empty
                        <div
                                class="col-12 text-center py-5"
                                data-aos="fade-up"
                                data-aos-delay="100"
                            >
                                No Products Found
                            </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-lg-12">
                <div class="col-12 text-center py-2 d-lg-none">
                        <a href="https://click.accesstra.de/adv.php?rk=005evb0017x9" target="_blank">
                            <img src="https://imp.accesstra.de/img.php?rk=005evb0017x9" border="0"/>
                        </a>
                    </div>
                <div class="card d-none d-sm-block" style="background-image:url('{!! asset('/images/banner4.png') !!}'); ">
                    <div class="card-body p-4">
                    <h1 class="mb-4 text-white " >Punya produk digital ?</h1>
                    <p class="mb-4 text-white ">
                        Jangan cuma jadi aset di laptop, AYO Mulai Jualan !!!!
                    </p>
                    <a href="{{  route('register') }}" class="btn btn-warning btn-rounded me-2" >Daftar</a>
                    <a href="#" class="btn btn-link btn-rounded text-white" >Pelajari</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="store-new-products mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5 style="border-left: black solid;">&nbsp Produk</h5>
                    </div>
                </div>
                <div class="row">
                    @php $incrementProduct = 0 @endphp
                    @forelse ($products as $product)
                    <?php if( $product->diskon == 0 ) {
                                ?>
                        <div
                        class="col-6 col-md-4 col-lg-3"
                        data-aos="fade-up"
                        data-aos-delay="{{  $incrementProduct += 100 }}"
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
                                <div class="products-text">
                                    {{  $product->name }}
                                </div>
                                <div style="color:gray; size:10px;">
                                    By {{  $product->user->store_name }}
                                </div>
                                <div class="products-price">
                                    Rp. {{ number_format($product->price) }}
                                </div>
                            </a>
                        </div>
                        <?php } ?>
                    @empty
                        <div
                                class="col-12 text-center py-5"
                                data-aos="fade-up"
                                data-aos-delay="100"
                            >
                                No Products Found
                            </div>
                    @endforelse
                </div>
            </div>
        </section>
@endsection
