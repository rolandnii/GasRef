<x-app-layout>
    <x-slot name="title">
        Order
    </x-slot>
    <div class="container-fluid py-4">
        <div class="row ">
            <div class="col-md-7 mb-xl-0 mx-auto mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-lg mb-0 text-capitalize font-weight-bold">Refilling order</p>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
    
                        <form action="{{ url('order/confirm') }}" method="Post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="" class="">Cylinder Size</label>
                                        <select name="cylinder_size" class="form-control">
                                            @foreach ($cylinders as $cylinder)
                                            <option value="{{ $cylinder->size }}">{{ $cylinder->size }}</option>
                                            @endforeach
                                            
                                        </select>
                                        @error('cylinder_size')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Delivery Date</label>
                                        <input type="date" class="form-control"  name="delivery_date" value="{{ old('delivery-date') ?? date('Y-m-d') }}">
                                    </div>
                                </select>
                                @error('delivery_rate')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-info bg-gradient-info">Order</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
