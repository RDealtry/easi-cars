use Illuminate\Support\Facades\Log;

@extends('layouts.master')

@section('title')
    Certificates
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
                Certificate List
            </h3>
            <button class="btn btn-success pull-right create"><i class="glyphicon glyphicon-plus"></i> Create</button>
            <div class="clearfix"></div>
        </div>
        <div class="table-responsive">
            <table id="certificates-table" class="table">
                <thead>
                    <td>House id</td>
                    <td>Address</td>
                    <td>Type</td>
                    <td>Certificate no</td>
                    <td>Issued</td>
                    <td>Action</td>
               </thead>
            </table>
        </div>
        <?php
            Log::info("certificates/index.blade.php - thead");
        ?>
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
                    <?php
                        Log::info("certificates/index.blade.php - add");
                    ?>
                    <!--
                    <div class="form-group">
                            <label for="house_id">House_id</label>
                            <input type="number" class="form-control house_id" name="house_id" placeholder="Enter house_id">
                        </div>
-->
                        <div class="form-group">
                        <label for="houses">House address*</label>
                            <select name="houses" id="houses" class="form-control address" placeholder="Select house" required>
                                <option disabled="true" value="choose">Select House</option>
                                <option value="">None</option>
                                @foreach($myhouses as $myhouse )
                                    <option value="{{ $myhouse->id }}">{{ $myhouse->address }}</option>
                                @endforeach
                        <div class="form-group">
                            <label for="type">Type*</label>
                            <select class="form-control type" id="type" name="type" required>
                                <option disabled="true" value="choose">Select type of certificate</option>
                                <option value="">None</option>
                                <option value="Electric">Electric</option>
                                <option value="Fire">Fire</option>
                                <option value="Gas">Gas</option>
                                <option value="PAT">PAT</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cert_no">Certificate no*</label>
                            <input type="text" class="form-control cert_no" name="cert_no" placeholder="Enter certificate no (if applicable)">
                        </div>
                        <div class="form-group">
                            <label for="issued">Issued*</label>
                            <input type="date" class="form-control issued" name="issued" placeholder="Enter issued date" required>
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

                        <div class="form-group">
                            <input type="hidden" name="id" class="id", id="id">
                        <div class="form-group">
                            <label for="house_id">House_id*</label>
                            <input type="text" class="form-control house_id" name="house_id" id="house_id" placeholder="Enter house_id" required>
                        </div>

                        <div class="form-group">
                            {{ Form::label('houses', 'House address*') }}
                            {{ Form::select('houses', $myhousesSelectList, 0, array('id' => 'houses', 'class' => 'form-control houses', 'data-placeholder' => 'Select house', 'required' => '')) }}
                            <!--<label for="houses">House address*</label>
                            <select name="houses" id="houses" class="form-control houses" placeholder="Select house" required>
                                <option disabled="true" value="choose">Choose House</option>
                                    @foreach($myhouses as $myhouse)
                                        <option value="{{ $myhouse->id }}">{{ $myhouse->address }}</option>
                                    @endforeach
                            </select>-->
                        </div>

                        <div class="form-group">
                            <label for="type">Type*</label>
                            <select class="form-control type" id="type" name="type" required>
                                <option disabled="true" value="choose">Select type of certificate</option>
                                <option value="">None</option>
                                <option value="Electric">Electric</option>
                                <option value="Fire">Fire</option>
                                <option value="Gas">Gas</option>
                                <option value="PAT">PAT</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cert_no">Certificate no</label>
                            <input type="text" class="form-control cert_no" name="cert_no" placeholder="Enter cert_no" required>
                        </div>
                        <div class="form-group">
                            <label for="issued">Issued date*</label>
                            <input type="date" class="form-control issued" name="issued" placeholder="Enter issued date (YYYY-MM-DD)">
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
    <script src="{{ asset('js/certificates/certificate_function.js') }}"></script>
@endpush

