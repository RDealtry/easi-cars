@extends('layouts.master')

@section('title')
    Warnings
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
@endsection

@section('brand')
    Easiwebs
@endsection

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title pull-left">
            Warning List
            </h3>
            <button class="btn btn-success pull-right create"><i class="glyphicon glyphicon-plus"></i> Create</button>
            <div class="clearfix"></div>
        </div>
        <div class="table-responsive">
            <table id="warnings-table" class="table">
                <thead>
                    <td>Tenant</td>
                    <td>Staff Member</td>
                    <td>Note</td>
                    <td>Warning Date</td>
                    <td>Reason</td>
                    <td>Warning No</td>
                    <td>Manager Approves (Y/N)</td>
                    <td>Expiry Date</td>
                    <td>Action</td>
               </thead>
            </table>
        </div>

    </div>


    {{-- modal for add --}}
    <div id="modalAdd" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <form id="store">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tenant_id">Tenant*</label>
                            <input type="number" class="form-control tenant_id" name="tenant_id" placeholder="Pick Tenant" required>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Staff Member*</label>
                            <input type="number" class="form-control user" name="user_id" placeholder="Pick Staff Member" required>
                        </div>
                        <div class="form-group">
                            <label for="note">Note*</label>
                            <input type="text" class="form-control note" name="note" placeholder="Enter note" required>
                        </div>
                        <div class="form-group">
                            <label for="warning_date">Warning Date*</label>
                            <input type="date" class="form-control warning_date" name="warning_date" placeholder="Enter warning date (YYYY-MM-DD)" required>
                        </div>
                        <div class="form-group">
                            <label for="reason">Reason*</label>
                            <select class="form-control reason" id="reason" name="reason" required>
                                <option disabled="true" value="choose">Select a reason</option>
                                <option value="">None</option>
                                <option value="Non payment of topup">Non payment of topup</option>
                                <option value="Non engagement">Non engagement</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="warning_no">Warning no*</label>
                            <select class="form-control warning_no" id="warning_no" name="warning_no" required>
                                <option disabled="true" value="choose">Select a warning no</option>
                                <option value="">None</option>
                                <option value="Verbal">Verbal</option>
                                <option value="First">First</option>
                                <option value="Second">Second</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="manager_yn">Manager approval (Y/N)*</label>
                            <select class="form-control manager_yn" id="manager_yn" name="manager_yn" required>
                                <option disabled="true" value="choose">Select Y if manager approves</option>
                                <option value="">None</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expiry_date">Expiry Date*</label>
                            <input type="date" class="form-control expiry_date" name="expiry_date" placeholder=" Enter expiry date (YYYY-MM-DD)" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal for edit --}}
    <div id="modalEdit" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <form id="update">
                    <div class="modal-body">
                        <input type="hidden" name="id" class="id">
                        <div class="form-group">
                            <label for="tenant_id">Tenant*</label>
                            <input type="number" class="form-control tenant_id" name="tenant_id" placeholder="Pick Tenant" required>
                        </div>
                        <div class="form-group">
                            <label for="user_id">Staff Member*</label>
                            <input type="number" class="form-control user_id" name="user_id" placeholder="Pick Staff Member" required>
                        </div>
                        <div class="form-group">
                            <label for="note">Note*</label>
                            <input type="text" class="form-control note" name="note" placeholder="Enter note" required>
                        </div>
                        <div class="form-group">
                            <label for="warning_date">Warning Date*</label>
                            <input type="date" class="form-control warning_date" name="warning_date" placeholder="Enter warning date (YYYY-MM-DD)" required>
                        </div>
                        <div class="form-group">
                            <label for="reason">Reason*</label>
                            <select class="form-control reason" id="reason" name="reason" required>
                                <option value="choose">Select a reason</option>
                                <option value="">None</option>
                                <option value="Non payment of topup">Non payment of topup</option>
                                <option value="Non engagement">Non engagement</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="warning_no">Warning no*</label>
                            <select class="form-control warning_no" id="warning_no" name="warning_no" required>
                                <option value="choose">Select a warning no</option>
                                <!--<option disabled="true" value="choose">Select a warning no</option>-->
                                <option value="">None</option>
                                <option value="Verbal">Verbal</option>
                                <option value="First">First</option>
                                <option value="Second">Second</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="manager_yn">Manager approval (Y/N)*</label>
                            <select class="form-control manager_yn" id="manager_yn" name="manager_yn" required>
                                <option value="choose">Select Y if manager approves</option>
                                <option value="">None</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expiry_date">Expiry Date*</label>
                            <input type="date" class="form-control expiry_date" name="expiry_date" placeholder=" Enter expiry date (YYYY-MM-DD)" required>
                        </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script src="{{ asset('js/warnings/warning_function.js') }}"></script>
@endpush

