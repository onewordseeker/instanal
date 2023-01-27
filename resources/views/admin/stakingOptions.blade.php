@extends('layouts.master')



@section('content')
<style>
    .main-form{
        height: calc(100vh - (250px));
    }
    .
</style>

<div class="row">
    <div class="col-12">
        <div class="card-table-border-none" id="recent-orders">
            <div class="text-center mt-4 justify-content-between">
                <h2>Staking Options</h2>
            </div>
        </div>

        <div class="main-form">
            <form action="{{route('show.staking')}}" method="GET">
                @csrf
               <div style="width: 60%;margin:auto">
        <label for="group_id">Choose Filter Type:</label>
        <select data-placeholder="Choose..." required name="input_type" id="input_type" class="form-control" required onchange="inputChange()">
            <option value="all">All</option>
            <option value="in_progress">In Progress</option>
            <option value="cancelled">Cancelled</option>
            <option value="funds_pending">Funds Transfer Pending</option>
            <option value="completed">Completed</option>
        </select>
                <button type="submit" onclick="chckValidate()" class="btn btn-primary" style="margin-top: 15px">Submit</button>
                 <input type="hidden" name="type" value="all" id="type">
            </form>
        </div>

    <script>
        function inputChange() {
        if ($("#input_type").val() == "in_progress") {
            $("#type").val("in_progress")
        } else if($("#input_type").val() == "cancelled"){
            $("#type").val("cancelled")
        }
        else if($("#input_type").val() == "funds_pending"){
            $("#type").val( "funds_pending")
        }   
        else if($("#input_type").val() == "completed"){
            $("#type").val( "completed")
        }
        else{
            $("#type").val( "all")
        }
           console.log($("#type").val());
    }
    </script>

    @endsection