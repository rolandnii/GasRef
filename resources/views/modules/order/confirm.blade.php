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
                                    <span class="text-white text-normal">25kg</span>
                                </div>
                            </div>
                            <div class="col-md-12 my-1">
                                <div class="d-flex justify-content-between">
                                    <span class="text-white opacity-8">Delivery Date</span>
                                    <span class="text-white text-normal">23rd May 2023</span>
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
                                    <span class="text-white">₵ 1000.00</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <span class="text-white opacity-8">Delivery Rate</span>
                                    <span class="text-white">₵ 10.00</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <span class="text-white opacity-8">Discount</span>
                                    <span class="text-white">₵ 0.00</span>
                                </div>
                            </div>
                        </div>
                        <hr class="bg-white my-3" style="height: 2px;">
                        <div class="row">
                            <div class="col-md-12 text-end">
                                <span class="text-white opacity-8 text-sm">Total:</span>
                                <span class="text-white text-xl text-bold">₵1010.00</span>
                            </div>
                            <div class="col-md-12 text-center">
                                {{-- form start --}}
                                <form action="">
                                    <button type="submit" class="btn btn-success text-capitalize mb-2">Confirm order</button>
                                </form>
                            </div>
                        </div>
                        {{-- <form action="{{ url('order/confirm') }}" method="Post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="">Cylinder Size</label>
                                        <select name="cylinder-size" class="form-control">
                                            <option value="5">5kg</option>
                                            <option value="6">6kg</option>
                                            <option value="13">13kg</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Delivery Date</label>
                                        <input type="date" class="form-control"  name="delivery-date" value="{{ old('delivery-date') ?? date('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-info bg-gradient-info">Order</button>
                                </div>
                            </div>

                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
