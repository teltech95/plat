@extends('layouts.normal.index')

@section('content')
<main role="main" class="pb-3">
    <div class="navbar navbar-expand-lg px-0 navbar-dark my-3 d-print-none">
       <h3>My Deductions</h3>
       <div class="ml-auto" style=""></div>
    </div>
    <div class="d-print-block">

       <h5 class="mb-0">Hello! <strong> {{ Auth::user()->name }}</strong>!</h5>

       <hr />


       <div class="card">
          <table class="table table-active mb-0">
             <thead>
                <tr>
                   <th>Organisation</th>
                   <th>Year</th>
                   <th>Jan</th>
                   <th>Feb</th>
                   <th>Mar</th>
                   <th>April</th>
                   <th>May</th>
                   <th>Jun</th>
                   <th>Jul</th>
                   <th>Aug</th>
                   <th>Sep</th>
                   <th>Oct</th>
                   <th>Nov</th>
                   <th>Dec</th>
                   <th>Totals</th>

                </tr>
             </thead>
             <tbody>
                @foreach ($ded_payment as $dp)
                <tr class="">
                    <td><a>{{$dp->organisation}}</a></td>
                    <td><a> {{$dp->year}}</a></td>
                    <td><a>$ {{$dp->jan}}</a></td>
                    <td><a>$ {{$dp->feb}}</a></td>
                    <td><a>$ {{$dp->mar}}</a></td>
                    <td><a>$ {{$dp->april}}</a></td>
                    <td><a>$ {{$dp->may}}</a></td>
                    <td><a>$ {{$dp->jul}}</a></td>
                    <td><a>$ {{$dp->aug}}</a></td>
                    <td><a>$ {{$dp->sept}}</a></td>
                    <td><a>$ {{$dp->oct}}</a></td>
                    <td><a>$ {{$dp->nov}}</a></td>
                    <td><a>$ {{$dp->dec}}</a></td>
                    <td><a>$ -</a></td>

                 </tr>
                @endforeach
             </tbody>
          </table>
       </div>
    </div>
 </main>
@endsection

