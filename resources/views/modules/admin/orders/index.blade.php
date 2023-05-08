<x-app-layout>
    <x-slot name="title">
        Orders
    </x-slot>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Orders List</h6>
                    </div>
                    <div class="card-body">
                        <div class="row d-flex gap-4">
                            @foreach ($myOrders as $item)
                                <div class="bg-gray-100 border-0 border-radius-lg text-dark col-md-5 px-3 py-4">

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
                                        <div class="mt-1">
                                            <span class="badge badge-sm bg-primary">{{ $item->status }}</span>
                                        </div>
                                        <div class="mt-3">
                                            {{-- <button class="btn btn-danger btn-sm text-sm"> Delete</button> --}}
                                            <button class="btn btn-info btn-sm text-sm edit-btn" data-bs-toggle="modal"
                                            data-cylinder="{{ $item->cylinder_size }}"
                                            data-delivery="{{ $item->delivery_date }}"
                                            data-transid="{{ $item->transid }}"
                                            data-status="{{ $item->status }}"
                                                data-bs-target="#editOrder"> Edit</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('modules.admin.orders.modals.edit')
    </div>
    </div>
    @push('script')
    <script>
        $('.edit-btn').click(function (e) { 
            e.preventDefault();
            
        });
    </script>
@endpush
</x-app-layout>
