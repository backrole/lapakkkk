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
      <h2 class="dashboard-title">#{{ $transaction->code }}</h2>
      <p class="dashboard-subtitle">
        Detail Transaksi
      </p>
    </div>
    <div class="dashboard-content" id="transactionDetails">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-4">
                  <img
                    src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}"
                    class="w-100 mb-3"
                    alt=""
                  />
                </div>
                <div class="col-12 col-md-8">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-title">Customer Name</div>
                      <div class="product-subtitle">{{ $transaction->transaction->user->name }}</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Product Name</div>
                      <div class="product-subtitle">
                        {{ $transaction->product->name }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">
                        Date of Transaction
                      </div>
                      <div class="product-subtitle">
                        {{ $transaction->created_at }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Payment Status</div>
                      <div v-model="status" class="product-subtitle text-danger" value={{ $transaction->transaction->transaction_status }}>
                        {{ $transaction->transaction->transaction_status }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">
                        Total Amount
                      </div>
                      <div class="product-subtitle">
                        Rp. {{ number_format($transaction->transaction->total_price) }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">
                        Mobile
                      </div>
                      <div class="product-subtitle">
                        {{ $transaction->transaction->user->phone_number }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <form action="{{ route('dashboard-transaction-update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <!-- <div class="col-12 mt-4">
                    <h5>Shipping Information</h5>
                  </div> -->
                  <div class="col-12">
                    <div class="row">
                      <!-- <div class="col-12 col-md-6">
                        <div class="product-title">Address I</div>
                        <div class="product-subtitle">
                          {{ $transaction->transaction->user->address_one }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Address II</div>
                        <div class="product-subtitle">
                          {{ $transaction->transaction->user->address_two }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Province</div>
                        <div class="product-subtitle">
                          {{ App\Models\Province::find($transaction->transaction->user->provinces_id)->name }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">City</div>
                        <div class="product-subtitle">
                          {{ App\Models\Regency::find($transaction->transaction->user->regencies_id)->name }}
                        </div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Postal Code</div>
                        <div class="product-subtitle">{{ $transaction->transaction->user->zip_code }}</div>
                      </div>
                      <div class="col-12 col-md-6">
                        <div class="product-title">Country</div>
                        <div class="product-subtitle">{{ $transaction->transaction->user->country }}</div>
                      </div> -->
                      <!-- <div class="col-12 col-md-3">
                        <div class="product-title">Shipping Status</div>
                        <select
                          name="shipping_status"
                          id="status"
                          class="form-control"
                          v-model="status"
                        >
                          <option value="PENDING">Pending</option>
                          <option value="SHIPPING">Shipping</option>
                          <option value="SUCCESS">Success</option>
                        </select>
                      </div> -->

                    </div>
                  </div>
                </div>
              </form>
                        <div v-if= "status == 'SUCCESS'" class="col-md-12">
                            <form target="_blank" action={{ $transaction->product->link }} >
                          <button
                            type="submit"
                            class="btn btn-success btn-block mt-4"
                          >
                            Download
                          </button>
                          </form>
                        </div>


                <div class="col-12">
                    <h5>Komentar Anda</h5>
                </div>
                <section class="store-review mb-2 bg-grey">
                    <div class="container">
                        <div class="row">
                        <div class="col-12 col-lg-8">
                            <ul class="list-unstyled">
                            <li class="media">
                                 <img
                                    src="/images/icons-testimonial-1.png"
                                    alt=""
                                    class="mr-3 rounded-circle" style="width:50px;"
                                    />
                                <div class="media-body">
                                    <h5 class="mt-2 mb-1">{{ $transaction->transaction->user->name }}</h5>
                                    <div v-model="bintang" class="ratingdua" value={{ $transaction->rating }}>
                                        <input type="radio" <?php if ($transaction->rating == 5) {
                                            echo "checked";
                                        } ?>>
                                            <label>☆</label>
                                        <input type="radio" <?php if ($transaction->rating == 4) {
                                            echo "checked";
                                        } ?>>
                                            <label>☆</label>
                                        <input type="radio" <?php if ($transaction->rating == 3) {
                                            echo "checked";
                                        } ?>>
                                            <label>☆</label>
                                        <input type="radio" <?php if ($transaction->rating == 2) {
                                            echo "checked";
                                        } ?>>
                                            <label>☆</label>
                                        <input type="radio" <?php if ($transaction->rating == 1) {
                                            echo "checked";
                                        } ?>>
                                            <label>☆</label>
                                    </div>
                                    {!! $transaction->comment !!}
                                </div>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="dashboard-content py-2" id="transactionDetails">
      <div class="row">
        <div class="col-12">
          <div class="card">
              <div class="card-body">
                <div class="col-12 py-3">
                    <h5>Tulis Komentar</h5>
                </div>
                <form action="{{ route('dashboard-transaction-update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="rating">
                    <input type="radio" name="rating" value="5" id="5">
                        <label for="5">☆</label>
                    <input type="radio" name="rating" value="4" id="4">
                        <label for="4">☆</label>
                    <input type="radio" name="rating" value="3" id="3">
                        <label for="3">☆</label>
                    <input type="radio" name="rating" value="2" id="2">
                        <label for="2">☆</label>
                    <input type="radio" name="rating" value="1" id="1">
                        <label for="1">☆</label>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <textarea name="comment" id="editor"></textarea>
                    </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      Save Now
                    </button>
                  </div>
              </div>
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
  <script src="/vendor/vue/vue.js"></script>
  <script>
    var transactionDetails = new Vue({
      el: "#transactionDetails",
      data: {
        status: "{{ $transaction->transaction->transaction_status }}",
        resi: "{{ $transaction->resi }}",
      },
    });
  </script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace("editor");
  </script>
@endpush

