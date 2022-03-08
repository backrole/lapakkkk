@extends('layouts.app')

@section('title')
    Lapakcode
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-details">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">
                    Product Details
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-gallery mb-3" id="gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-8" data-aos="zoom-in">
              <transition name="slide-fade" mode="out-in">
                <img
                  :src="photos[activePhoto].url"
                  :key="photos[activePhoto].id"
                  class="w-100 main-image"
                  alt=""
                />
              </transition>
            </div>
            <div class="col-lg-2">
              <div class="row">
                <div
                  class="col-3 col-lg-12 mt-2 mt-lg-0"
                  v-for="(photo, index) in photos"
                  :key="photo.id"
                  data-aos="zoom-in"
                  data-aos-delay="100"
                >
                  <a href="#" @click="changeActive(index)">
                    <img
                      :src="photo.url"
                      class="w-100 thumbnail-image"
                      :class="{ active: index == activePhoto }"
                      alt=""
                    />
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <h1>{{ $product->name }}</h1>
                <a href="http://localhost:8000/talent/{{ $product->user->store_name }}">
                <div class="owner">By {{ $product->user->store_name }}</div>
                </a>
                <?php if( $product->diskon == 0 ) {?>
                   <div class="price">Rp. {{ number_format($product->price) }}</div>
                <?php } else { ?>
                    <div class="price">
                    <span style="color:gray; size:10px; text-decoration: line-through red;">
                        Rp. {{ number_format($product->price) }}
                    </span>&nbsp
                    <img src="https://img.icons8.com/material-rounded/18/fa314a/long-arrow-right.png"/>
                        Rp. {{ number_format(($product->price)-($product->diskon)) }}
                    </div>
                <?php } ?>
              </div>
              <div class="col-lg-2" data-aos="zoom-in">
                @auth
                    <form action="{{ route('detail-add', $product->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <button
                        type="submit"
                        class="btn btn-success px-4 text-white btn-block mb-3"
                      >
                        Add to Cart
                      </button>
                    </form>
                @else
                    <a
                      href="{{ route('login') }}"
                      class="btn btn-success px-4 text-white btn-block mb-3"
                    >
                      Sign in to Add
                    </a>
                @endauth
              </div>
            </div>
          </div>
        </section>
        <section class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                {!! $product->description !!}
              </div>
            </div>
          </div>
        </section>

        <section class="store-review">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8 mt-3 mb-3">
                <h5>Komentar</h5>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-8">
                <ul class="list-unstyled">
                    @foreach($test as $t)
                    <?php if ( $t->products_id == $product->id) {
                    ?>
                    <li class="media">
                        <img
                        src="/images/icons-testimonial-1.png"
                        alt=""
                        class="mr-3 rounded-circle"
                        />
                        <div class="media-body">

                        <h5 class="mt-2 mb-1">{{ $t->transaction->user->name }}</h5>
                        <div v-model="bintang" class="ratingdua" value={{ $t->rating }}>
                                        <input type="radio" <?php if ($t->rating == 5) {
                                            echo "checked";
                                        } ?>>
                                            <label>☆</label>
                                        <input type="radio" <?php if ($t->rating == 4) {
                                            echo "checked";
                                        } ?>>
                                            <label>☆</label>
                                        <input type="radio" <?php if ($t->rating == 3) {
                                            echo "checked";
                                        } ?>>
                                            <label>☆</label>
                                        <input type="radio" <?php if ($t->rating == 2) {
                                            echo "checked";
                                        } ?>>
                                            <label>☆</label>
                                        <input type="radio" <?php if ($t->rating == 1) {
                                            echo "checked";
                                        } ?>>
                                            <label>☆</label>
                                    </div>
                        {!! $t->comment !!}
                        </div>
                    </li>
                    <?php } ?>

                    @endforeach
                </ul>
              </div>
            </div>
          </div>
        </section>
        <section class="store-new-products pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5 style="border-left: black solid;">&nbsp Rekomendasi Produk</h5>
                    </div>
                </div>
                <div class="row" >
                    @php $incrementProduct = 0 @endphp
                    @forelse ($products as $product)
                    <?php if( $product->categories_id == $product->categories_id ) {
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
                                <?php if( $product->diskon > 0 ) {
                                    ?>
                                    <span style="color:gray; size:10px; text-decoration: line-through red;">
                                        Rp. {{ number_format($product->price) }}
                                    </span>&nbsp <img src="https://img.icons8.com/material-rounded/24/fa314a/long-arrow-right.png"/>
                                    Rp. {{ number_format(($product->price)-($product->diskon)) }}
                                <?php } ?>
                                <?php if( $product->diskon == 0 ) {
                                    ?>
                                    <span style="color:gray; size:10px;">
                                        Rp. {{ number_format($product->price) }}
                                    </span>
                                <?php } ?>
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
    </div>
@endsection



@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var gallery = new Vue({
        el: "#gallery",
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
            @foreach ($product->galleries as $gallery)
            {
              id: {{ $gallery->id }},
              url: "{{ Storage::url($gallery->photos) }}",
            },
            @endforeach
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
@endpush
