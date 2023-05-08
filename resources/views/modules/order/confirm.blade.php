<x-app-layout>
    <x-slot name="title">
        Confirm Order
    </x-slot>
    <div class="container-fluid py-4">
        <div class="row ">
            <div class="col-md-7 mb-xl-0 mx-auto mb-4">
                <div class="card bg-gradient-info">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="mb-0 text-2xl text-capitalize font-weight-bold text-white">Order Summary</p>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-white" style="height: 2px;">
                        <div class="row">
                            <div class="col-md-12 mb-1">
                                <div class="d-flex justify-content-between">
                                    <span class="text-white opacity-8">Cylinder Size</span>
                                    <span class="text-white text-normal">{{ $cylinderSize }}</span>
                                </div>
                            </div>
                            <div class="col-md-12 my-1">
                                <div class="d-flex justify-content-between">
                                    <span class="text-white opacity-8">Delivery Date</span>
                                    <span class="text-white text-normal">{{ $displayDeliveryDate }}</span>
                                </div>
                            </div>
                            <div class="col-md-12 my-1">
                                <div class="d-flex justify-content-between">
                                    <span class="text-white opacity-8">Status</span>
                                    <span class="text-white text-normal">Pending</span>
                                </div>
                            </div>
                            <div class="col-md-12 my-3">
                                <div class="opacity-4 border-light" style="height: 1px; border-top: 2px dashed;"></div>
                            </div>
                           
                            <div class="col-md-12 my-1">
                                <div class="d-flex justify-content-between">
                                    <span class="text-white opacity-8">Subtotal</span>
                                    <span class="text-white">₵ {{ $subTotal->price }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <span class="text-white opacity-8">Delivery Rate</span>
                                    <span class="text-white">₵ {{ $deliveryRate }}</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <span class="text-white opacity-8">Discount</span>
                                    <span class="text-white">₵ {{ $discount }}</span>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-white my-3" style="height: 2px;">
                        <div class="row">
                            <div class="col-md-12 text-end">
                                <span class="text-white opacity-8 text-sm">Total:</span>
                                <span class="text-white text-xl text-bold">₵ {{ $total }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12 text-center my-4">
                            <a href="{{ url('order/confirm/'."$transid") }}"><button type="submit" class="btn btn-secondary px-5 text-capitalize mb-2">Confirm order</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
    @endpush
</x-app-layout>

