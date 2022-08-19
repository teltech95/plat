@extends('layouts.company.index')

@section('content')
<main role="main" class="pb-3">
    <div class="navbar navbar-expand-lg px-0 navbar-dark my-3 d-print-none">
       <h3>Registed Organizations</h3>
       <div class="ml-auto" style=""></div>
    </div>
    <div class="d-print-block">
        <form method="GET" action="{{route('company.search')}}">
            <div class="input-group mb-3">
                <input  name="search" required type="text" class="form-control" placeholder="Search by organisation or code" aria-label="Search by organisation or code" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
              </div>
            </form>
       <hr />
       <div class="card">
          <table class="table table-active mb-0">
             <thead>
                <tr>
                   <th>id</th>
                   <th>Code</th>
                   <th>Organisation</th>
                   <th>Owner ID</th>
                    <th>Actions</th>
                </tr>
             </thead>
             <tbody>
                @foreach ($companies as $dp)
                <tr class="">
                    <td><a>{{$dp->id}}</a></td>
                    <td><a> {{$dp->code}}</a></td>
                    <td><a> {{$dp->name}}</a></td>
                    <td><a> {{$dp->user}}</a></td>
                    <td class="small"><a class="btn btn-danger" href="{{route('company.destroy_deduction', ['id' => $dp->id])}}">Delete</a></td>

                 </tr>
                @endforeach
             </tbody>
          </table>
       </div>
    </div>
 </main>
@endsection

