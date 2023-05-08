<x-app-layout>
    <x-slot name="title">
        Dashboard
    </x-slot>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-lg mb-0 text-capitalize font-weight-bold">Total Orders</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <span class="text-success text-2xl font-weight-bolder">{{ $orders }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-lg mb-0 text-capitalize font-weight-bold">Today's Orders</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <span class="text-success text-2xl font-weight-bolder">{{ $pendingTodayOrder }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-9">
                                <div class="numbers">
                                    <p class="text-lg mb-0 text-capitalize font-weight-bold">Pending Orders</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <span class="text-success text-2xl font-weight-bolder">{{ $pendingOrder }}</span>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-3 text-end">
                                <div class="icon icon-shape bg-gradient-info shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
