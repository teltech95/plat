@extends('layouts.corporate.index')

@section('content')

<main role="main" class="pb-3">
    <div class="navbar navbar-expand-lg px-0 navbar-dark my-3 d-print-none">
       <div class="ml-auto" style="">
          <div class="btn-group">
             <div class="dropdown">

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                   <a class="dropdown-item " href="/Deduction?StatId=0">Pending</a>
                   <a class="dropdown-item " href="/Deduction?StatId=1">Approved</a>
                   <a class="dropdown-item " href="/Deduction?StatId=2">Rejected</a>
                </div>
             </div>
          </div>
          <div class="btn-group">

          </div>

          <div class="btn-group">
             <a class="btn btn-primary" href="{{route('corporate.add_deduction')}}"><i class="fa fa-user-plus"></i>&nbsp;Add new record..</a>
          </div>
       </div>
    </div>
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="d-print-block">
        <form method="GET" action="{{route('corporate.search_records')}}">
            <div class="input-group mb-3">
                <input  name="search" required type="text" class="form-control" placeholder="Search here ..." aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
              </div>
        </form>
       <table class="table table-striped table-sm table-hover border-bottom" id="example">
          <thead>

             <tr>
                <th>Record ID</th>
                <th>Reference</th>
                <th>Code</th>
                <th>Type</th>
                <th>Status</th>
                <th>ID number</th>
                <th>EC number</th>
                <th>Amount</th>
                <th>Date created</th>
                <th>Action</th>

             </tr>
          </thead>
          <tbody>
            @foreach ($deductions as $deduction)
             <tr>
                <td><a href="{{route('corporate.deduction_detail', ['record_ID' => $deduction->record_ID])}}">{{$deduction->record_ID}}</a></td>
                <td>{{$deduction->transaction_reference}}</td>
                <td>{{$deduction->code}}</td>
                <td><span class='small px-2 text-danger bg-white border-danger border rounded'><i class='fa fa-times'></i>
                    @if($deduction->request_type == 0)
                    New
                    @elseif ($deduction->request_type == 1)
                    Change
                    @else
                    Delete
                    @endif
                </span></td>
                <td><i class='fa fa-paper-plane text-info'></i>
                    @if($deduction->request_status == 0)
                    Pending
                    @elseif ($deduction->request_status == 1)
                    Approved
                    @elseif ($deduction->request_status == 2)
                    Rejected
                    @endif
                </td>
                <td>{{$deduction->id_number}}</td>
                <td>{{$deduction->ec_number}}</td>
                <td>USD {{$deduction->installment_amount}}</td>
                <td class="small">{{$deduction->createdAt}}</td>
                <td class="small"><a class="btn btn-danger" href="{{route('corporate.destroy_deduction', ['record_ID' => $deduction->record_ID])}}">Delete</a></td>
                <td class="small"><a class="btn btn-primary" href="{{route('corporate.update_deduction', ['record_ID' => $deduction->record_ID])}}">Update</a></td>

             </tr>
             @endforeach

          </tbody>
       </table>

    </div>
 </main>

 @endsection

 @section('scripts')

 @stop
