@extends('layouts.master')

@section('content')
    <table class="table table-bordered" id="houses-table">
        <thead>
            <tr>
                <th>Address</th>
                <th>Postcode</th>
                <th>Live date</th>
                <th>No of rooms</th>
                <th>Gender</th>
                <th>Landlord</th>
                <th>Dead date</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script>
$(function() {
    $('#houses-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! url("data") !!}',
        columns: [
            { data: 'address', name: 'address' },
            { data: 'postcode', name: 'postcode' },
            { data: 'live_date', name: 'live_date' },
            { data: 'no_rooms', name: 'no_rooms' },
            { data: 'gender', name: 'gender' }
            { data: 'landlord', name: 'landlord' }
            { data: 'dead_date', name: 'dead_date' }
        ]
    });
});
</script>
@endpush
