@extends('layouts.company.index')

@section('content')

<main role="main" class="pb-3">
    <div class="navbar navbar-expand-lg px-0 navbar-dark my-3 d-print-none">
        <h3>Query results</h3>
        <div class="ml-auto" style=""></div>
     </div>

    <div class="d-print-block">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
       <table class="table table-striped table-sm table-hover border-bottom">
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
                <td><a href="{{route('company.deduction_detail', ['record_ID' => $deduction->record_ID])}}">{{$deduction->record_ID}}</a></td>
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
                <td class="small"><a style="font-size:12" class="btn btn-primary" href="{{route('company.update_status', ['record_ID' => $deduction->record_ID])}}">Update</a></td>
             </tr>
             @endforeach

          </tbody>
       </table>

    </div>
 </main>

 @endsection
