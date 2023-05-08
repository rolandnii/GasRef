<x-app-layout>
    <x-slot name="title">
        Orders
    </x-slot>
    <div class="container-fluid py-4">
        <div class="row ">
            <div class="col-md-7 mb-xl-0 mx-auto mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="w-full d-flex justify-content-center">
                                    <button
                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-lg d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-check text-lg"></i>
                                </button>
                                </div>
                                <div class="numbers">
                                    <p class="text-lg mb-0 text-capitalize font-weight-bold">Order Completed</p>
                                    <a href="{{ url('/') }}">  <button class="btn btn-info btn-md bg-gradient-info text-capitalize mt-2"> Go to dashboard</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
