@extends('layouts.corporate.index')

@section('content')

<main role="main" class="pb-3">
    <div class="navbar navbar-expand-lg px-0 navbar-dark my-3 d-print-none" >

    </div>

    <div class="d-print-block ">
       <h4 class="font-weight-light mb-5"><strong>{{$total[0]->ttl}}</strong> deduction request(s) Approved</h4>
       <table class="table table-striped table-sm table-hover border-bottom">
          <thead>

             <tr>
                <th>Record ID</th>
                <th>Reference</th>
                <th>Code</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Amount</th>
                <th>Installment</th>
                <th>Status</th>
             </tr>
          </thead>
          <tbody>
            @foreach ($approved as $apprvd)
             <tr>
                <td><a href="{{route('corporate.rejected_deduction_detail', ['record_ID' => $apprvd->record_ID])}}">{{$apprvd->record_ID}}</a></td>
                <td>{{$apprvd->transaction_reference}}</td>
                <td>{{$apprvd->code}}</td>
                <td>{{$apprvd->deductions_start_date}}</td>
                <td>{{$apprvd->deductions_end_date}}</td>
                <td>{{$apprvd->total_amount}}</td>
                <td>{{$apprvd->installment_amount}}</td>
                <td><i class='fa fa-paper-plane text-info'></i>
                    @if($apprvd->request_status == 0)
                    Pending
                    @elseif ($apprvd->request_status == 1)
                    Approved
                    @elseif ($apprvd->request_status == 2)
                    Rejected

                    @endif

                </td>
             </tr>
             @endforeach

          </tbody>
       </table>

    </div>
 </main>

 @endsection
