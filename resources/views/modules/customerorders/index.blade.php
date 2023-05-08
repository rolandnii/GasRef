<x-app-layout>
    <x-slot name="title">
        Orders
    </x-slot>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">My Orders</h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            @forelse ($myOrders as $item)
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-3 text-sm">{{ $item->order_no }}</h6>
                                        <span class="text-xs mb-1">Cylinder Size: <span
                                                class="text-dark font-weight-bold ms-sm-2">{{ $item->cylinder_size }}</span></span>
                                        <span class="text-xs mb-1">Delivery Date: <span
                                                class="text-dark ms-sm-2 font-weight-bold">{{ date('jS M Y', strtotime($item->delivery_date)) }}</span></span>
                                        <span class="text-xs mb-1">Subtotal: <span
                                                class="text-dark ms-sm-2 font-weight-bold">{{ $item->subtotal }}</span></span>
                                        <span class="text-xs mb-1">Delivery: <span
                                                class="text-dark ms-sm-2 font-weight-bold">{{ $item->delivery }}</span></span>
                                        <span class="text-xs mb-1">Total: <span
                                                class="text-dark ms-sm-2 font-weight-bold">{{ $item->total }}</span></span>
                                    </div>
                                    <div class="ms-auto text-end">
                                        <span class="badge bg-gradient-warning">{{ $item->status }}</span>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                    <div class="d-flex flex-column text-center">
                                        <h6 class="mb-3 text-lg">No orders</h6>
                                    </div>
                                </li>
                            @endforelse


                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

{{-- <div class="col-md-5 mt-4">
              <div class="card h-100 mb-4">
                <div class="card-header pb-0 px-3">
                  <div class="row">
                    <div class="col-md-6">
                      <h6 class="mb-0">Your Transaction's</h6>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end align-items-center">
                      <i class="far fa-calendar-alt me-2"></i>
                      <small>23 - 30 March 2020</small>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-4 p-3">
                  <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
                  <ul class="list-group">
                   
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                        <div class="d-flex flex-column">
                          <h6 class="mb-1 text-dark text-sm">Apple</h6>
                          <span class="text-xs">27 March 2020, at 04:30 AM</span>
                        </div>
                      </div>
                      <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                        + $ 2,000
                      </div>
                    </li>
                  </ul>
        
                </div>
              </div>
            </div> --}}
