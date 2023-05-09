<div class="col-md-4">
    <!-- Modal -->
    <div class="modal fade" id="editOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalMessageTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize" id="exampleModalLabel">Edit order details</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm"  action="{{ url('order/update') }}" method="POST" >
                        @csrf
                        @method('POST')
                        <input type="hidden" name="code" class="form-control" id="transid">
                        <div class="form-group">
                            <label for="cylinder_size" class="col-form-label">Cylinder Size</label>
                            <select name="cylinder_size" class="form-control" id="cylinder_size">
                                @foreach ($cylinders as $item)
                                    <option value="{{ $item->size }}">{{ $item->size }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="delivery_date" class="col-form-label">Delivery Date</label>
                            <input type="date" name="delivery_date" class="form-control" id="delivery_date">
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-form-label">Status</label>
                            <select name="status" class="form-control" id="status">
                                    <option value="Pending">Pending</option>
                                    <option value="Confirmed">Confirmed</option>
                                    <option value="Picked">Picked</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-secondary text-white" data-bs-dismiss="modal">Close</button>
                    <button form="editForm" class="btn bg-info text-white">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>

</div>
