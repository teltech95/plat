@extends('layouts.company.index')

@section('content')

<main role="main" class="pb-3">
    <div class="navbar navbar-expand-lg px-0 navbar-dark my-3 d-print-none">
    </div>
    <div class="d-print-block">
       <div class="row">
          <div class="col-md-7">
             <div class="card">
                @foreach ($deduction as $detail)

                    <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-4 text-muted">Deduction code</label>
                                <div class="col-md-8"><a href="#">{{$detail->code}} - Kuntem (USD)</a></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 text-muted">Request type</label>
                                <div class="col-md-8"><span class='small px-2 text-danger bg-white border-danger border rounded'><i class='fa fa-times'></i>
                                    @if($detail->request_type == 0)
                                    New
                                    @elseif ($detail->request_type == 1)
                                    Change
                                    @else
                                    Delete
                                    @endif
                                </span></div>
                            </div>
                            <div class="mb-1 row">
                                <label class="col-md-4 text-muted">Record status</label>
                                <div class="col-md-8"><i class='fa fa-check-circle text-success'></i>
                                    @if($detail->request_status == 0)
                                    Draft
                                    @elseif ($detail->request_status == 1)
                                    Saved
                                    @elseif ($detail->request_status == 2)
                                    Sent
                                    @elseif ($detail->request_status == 3)
                                    Success
                                    @elseif ($detail->request_status == 4)
                                    Failed
                                    @elseif ($detail->request_status == 5)
                                    Canceled
                                    @else
                                    Processing
                                    @endif
                                </div>
                            </div>
                            <hr />
                            <div class="form-group row">
                                <label class="col-md-4 text-muted">Customer ID number</label>
                                <div class="col-md-8">{{$detail->record_ID}}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 text-muted">EC number</label>
                                <div class="col-md-8">{{$detail->id_number}}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 text-muted">Transaction reference</label>
                                <div class="col-md-8">{{$detail->transaction_reference}}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 text-muted">Deduction period</label>
                                <div class="col-md-8">{{$detail->deductions_start_date}} <i class="fa fa-arrow-right"></i> {{$detail->deductions_end_date}}</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 text-muted">Installment amount</label>
                                <div class="col-md-8">{{$detail->installment_amount}}</div>
                            </div>

                    </div>
                    <div class="card-footer small text-left" >
                    <div class="mb-1 row">
                        <label class="col-md-4 text-muted">Batch ID</label>
                        <div class="col-md-8"><a href="#">-</a></div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-md-4 text-muted">Record source</label>
                        <div class="col-md-8">USER INPUT</div>
                    </div>
                    <div class="mb-1 row">
                        <label class="col-md-4 text-muted">Created by</label>
                        <div class="col-md-8"><a href="#"> {{$detail->first_name}}</a></div>
                    </div>
                    <div class="row">
                        <label class="col-md-4 text-muted">Creation date</label>
                        <div class="col-md-8">{{$detail->createdAt}} </div>
                    </div>
                    </div>
                @endforeach
             </div>
          </div>
       </div>
    </div>
 </main>

 @endsection
