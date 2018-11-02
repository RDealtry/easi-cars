@extends('layouts.master')

@section('title')
    Casenotes
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
                Casenote List
            </h3>
            <button class="btn btn-success pull-right create"><i class="glyphicon glyphicon-plus"></i> Create</button>
            <div class="clearfix"></div>
        </div>
        <div class="table-responsive">
            <table id="casenotes-table" class="table">
                <thead>
                    <td>Tenant</td>
                    <td>Staff Member</td>
                    <td>Note</td>
                    <td>Casenote date</td>
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
                            <label for="tenant_id">Tenant id*</label>
                            <input type="number" class="form-control tenant_id" name="tenant_id" placeholder="Enter tenant_id">
                        </div>
                        <div class="form-group">
                            <label for="user_id">User id*</label>
                            <input type="number" class="form-control user_id" name="user_id" placeholder="Enter user_id">
                        </div>
                        <div class="form-group">
                            <label for="note">Note*</label>
                            <input type="text" class="form-control note" name="note" placeholder="Enter note">
                        </div>
                        <div class="form-group">
                            <label for="casenote_date">Casenote date*</label>
                            <input type="date" class="form-control casenote_date" name="casenote_date" placeholder="Enter casenote date">
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
                            <label for="tenant_id">Tenant id*</label>
                            <input type="number" class="form-control tenant_id" name="tenant_id" placeholder="Enter tenant_id" required>
                        </div>
                        <div class="form-group">
                            <label for="user_id">User id*</label>
                            <input type="number" class="form-control user_id" name="user_id" placeholder="Enter user_id" required>
                        </div>
                        <div class="form-group">
                            <label for="note">Note*</label>
                            <input type="text" class="form-control note" name="note" placeholder="Enter note" required>
                        </div>
                        <div class="form-group">
                            <label for="casenote_date">Casenote date*</label>
                            <input type="date" class="form-control casenote_date" name="casenote_date" placeholder="Enter casenote date" required>
                        </div>
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
    <script src="{{ asset('js/casenotes/casenote_function.js') }}"></script>
@endpush

