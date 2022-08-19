@extends('layouts.company.index')

@section('content')
<main role="main">
    <div class="row d-print-none">
       <div class="col pb-3">
          <div class="navbar navbar-expand-lg px-0 my-3">
             <h3>Add new company</h3>
             <div class="ml-auto" style=""></div>
          </div>
          <div class="d-print-block">
             <div class="card mb-4">
                <div class="card-body">
                   <div>

                      <div class="text-muted">Add New</div>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                   </div>
                   <hr />
                   <form method="POST" action="{{ route('company.saveCompany') }}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 text-muted">Company name</label>
                            <div class="col-md-8">
                                <input  type="text" class="form-control" id="" name="name" value="" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 text-muted">Code</label>
                            <div class="col-md-8">
                                <input  type="text" class="form-control" id="" name="code" value="" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 text-muted">Description</label>
                            <div class="col-md-8">
                                <input  type="text" class="form-control" id="" name="description" value="" required/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-4 text-muted">Owner</label>
                            <div class="col-md-8">
                                <select class="form-control"  required  data-val-required="The owner field is required."  name="owner">
                                    <option value="">Select..</option>
                                    @foreach ($all_users as $user)
                                    <option value="{{$user->id}}">{{$user->email}}</option>
                                    @endforeach

                                 </select>
                            </div>
                        </div>
                    <hr />
                    <div class="form-group row">
                            <label class="col-md-4 text-muted"></label>
                            <div class="col-md-8">
                                <button type="submit"  value = "Add student" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                   </form>
                </div>
             </div>

          </div>
       </div>
       <div class="col-3 collapse d-md-flex border-left border-light px-0 bg-light" style="min-height: 100vh">

       </div>
    </div>
 </main>

 @endsection
