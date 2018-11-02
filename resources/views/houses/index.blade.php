@extends('layouts.master')

@section('title')
    Houses
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
                House List
            </h3>
            <button class="btn btn-success pull-right create"><i class="glyphicon glyphicon-plus"></i> Create</button>
            <div class="clearfix"></div>
        </div>
        <div class="table-responsive">
            <table id="houses-table" class="table">
                <thead>
                    <td>Address</td>
                    <td>Postcode</td>
                    <td>Live date</td>
                    <td>Rooms (no)</td>
                    <td>Gender</td>
                    <td>Landlord</td>
                    <td>Dead_date</td>
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
                            <label for="address">Address*</label>
                            <input type="text" class="form-control address" name="address" placeholder="Enter address" required>
                        </div>
                        <div class="form-group">
                            <label for="postcode">Postcode</label>
                            <input type="text" class="form-control postcode" name="postcode" placeholder="Enter postcode">
                        </div>
                        <div class="form-group">
                            <label for="live_date">Live date</label>
                            <input type="date" class="form-control live_date" name="live_date" placeholder="Enter live date (YYYY-MM-DD)">
                        </div>
                        <div class="form-group">
                            <label for="no_rooms">Rooms (no)</label>
                            <input type="number" class="form-control no_rooms" name="no_rooms" min="1" max="15">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control gender" id="gender" name="gender">
                                <option disabled="true" value="choose">Select gender of house</option>
                                <option value="">None</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="landlord">Landlord</label>
                            <select class="form-control landlord" id="landlord" name="landlord">
                                <option disabled="true" value="choose">Select Landlord</option>
                                <option value="">None</option>
                                <option value="Green Pastures">Green Pastures</option>
                                <option value="Private">Private</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dead_date">Dead date</label>
                            <input type="date" class="form-control dead_date" name="dead_date" placeholder=" Enter dead date (YYYY-MM-DD)">
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
                            <input type="hidden" name="id" class="id">
                            <label for="address">Address*</label>
                            <input type="text" class="form-control address" name="address" placeholder="Enter address" required>
                        </div>
                        <div class="form-group">
                            <label for="postcode">Postcode</label>
                            <input type="text" class="form-control postcode" name="postcode" placeholder="Enter postcode">
                        </div>
                        <div class="form-group">
                            <label for="live_date">Live date</label>
                            <input type="date" class="form-control live_date" name="live_date" placeholder="Enter live date (YYYY-MM-DD)">
                        </div>
                        <div class="form-group">
                            <label for="no_rooms">Rooms (no)</label>
                            <input type="number" class="form-control no_rooms" name="no_rooms" min="0" max="15">
                        </div>
                        <div class="form-group">
                            <label for="gender ">Gender</label>
                            <select class="form-control gender" id="gender " name="gender ">
                                <option value="choose">Select gender of house</option>
                                <option value="">None</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="landlord">Landlord</label>
                            <select class="form-control landlord" id="landlord" name="landlord">
                                <option value="choose">Select Landlord</option>
                                <option value="">None</option>
                                <option value="Green Pastures">Green Pastures</option>
                                <option value="Private">Private</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dead_date">Dead date</label>
                            <input type="date" class="form-control dead_date" name="dead_date" placeholder=" Enter dead date (YYYY-MM-DD)">
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
    <script src="{{ asset('js/houses/house_function.js') }}"></script>
@endpush

