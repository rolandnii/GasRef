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
                          <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money</p>
                          <h5 class="font-weight-bolder mb-0">
                            $53,000
                            <span class="text-success text-sm font-weight-bolder">+55%</span>
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
        </div>
    </div>
</x-app-layout>
