@extends('layouts.corporate.index')

@section('content')
<main role="main" class="pb-3">
    <div class="navbar navbar-expand-lg px-0 navbar-dark my-3 d-print-none">
       <div class="ml-auto" style=""></div>
    </div>
    <div class="d-print-block">
       <h5 class="mb-0">Hello <strong> {{ Auth::user()->name }}</strong>!</h5>
       <hr />
       <div class="row">
          <div class="col-sm-3 mb-2">
             <div class="card border-warning shadow-sm text-center p-3" style="min-height:130px">
                <div class="h2"> {{$total_apprvd[0]->ttl}}</div>
                <div><a class="text-dark" href="{{route('corporate.approved_deduction')}}">Approved</a></div>
             </div>
          </div>
          <div class="col-sm-3 mb-2">
             <div class="card border-secondary shadow-sm text-center">
                <div class="card-body bg-warning" style="min-height:130px">
                   <div class="h4">{{$total_rejctd[0]->ttl}}</div>
                   <div><a class="text-dark" href="{{route('corporate.rejected_deduction')}}">Rejected</a></div>
                </div>
             </div>
          </div>
          <div class="col-sm-3 mb-2">
             <div class="card bg-warning border-success shadow-sm text-center p-3" style="min-height:130px">
                <div class="h2">{{$total_pending[0]->ttl}}</div>
                <div><a class="text-dark" href="{{route('corporate.pending_deduction')}}">Pending</a></div>
             </div>
          </div>

          <div class="col-sm-3 mb-2">
            <div class="card bg-warning border-secondary shadow-sm text-center p-3" style="min-height:130px">
               <div class="h2">1</div>
               <div><a class="text-dark" href="{{route('corporate.feedback')}}">Feedback</a></div>
            </div>
         </div>

       </div>

    </div>
 </main>
@endsection
