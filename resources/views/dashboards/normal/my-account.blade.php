@extends('layouts.normal.index')

@section('content')
<main role="main">
    <div class="row d-print-none">
       <div class="col pb-3">
          <div class="navbar navbar-expand-lg px-0 my-3">
             <h3>Kuntem Traders Pvt Ltd</h3>
             <div class="ml-auto" style=""></div>
          </div>
          <div class="d-print-block">
             <div class="card mb-4">
                <div class="card-body">
                   <div>

                      <div class="text-muted">My Account</div>
                   </div>
                   <hr />
                   <div class="form-group row">
                      <label class="col-md-4 text-muted">Name</label>
                      <div class="col-md-8">{{Auth::user()->name}}</div>
                   </div>
                   <div class="form-group row">
                    <label class="col-md-4 text-muted">Email</label>
                    <div class="col-md-8">{{Auth::user()->email}}</div>
                 </div>
                   <div class="form-group row">
                      <label class="col-md-4 text-muted">Status</label>
                      <div class="col-md-8"><i class='fa fa-check-circle text-info'></i> ACTIVE</div>
                   </div>
                   <div class="form-group row">
                      <label class="col-md-4 text-muted">Country</label>
                      <div class="col-md-8">Zimbabwe</div>
                   </div>
                   <div class="form-group row">
                      <label class="col-md-4 text-muted">Created At</label>
                      <div class="col-md-8"><a href="">{{Auth::user()->created_at}}</a></div>
                   </div>
                   <hr />

                </div>
             </div>
             {{-- <h4>Deduction codes</h4>
             <table class="table table-striped table-sm table-hover border-bottom">
                <thead>
                   <tr>
                      <th>Code</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Paymaster</th>
                      <th>Currency</th>
                   </tr>
                </thead>
                <tbody>
                   <tr>
                      <td>800081451</td>
                      <td><a href="/Deduction/Codes/Details/237">Kuntem Traders Pvt Ltd</a></td>
                      <td><i class='fa fa-check-circle text-info'></i> ACTIVE</td>
                      <td>SSB</td>
                      <td>ZWL</td>
                   </tr>
                   <tr>
                      <td>0533</td>
                      <td><a href="/Deduction/Codes/Details/779">Kuntem Traders</a></td>
                      <td><i class='fa fa-check-circle text-info'></i> ACTIVE</td>
                      <td>Pensions</td>
                      <td>ZWL</td>
                   </tr>
                   <tr>
                      <td>800184005</td>
                      <td><a href="/Deduction/Codes/Details/1733">Kuntem</a></td>
                      <td><i class='fa fa-check-circle text-info'></i> ACTIVE</td>
                      <td>SSB</td>
                      <td>USD</td>
                   </tr>
                </tbody>
             </table> --}}
          </div>
       </div>
       <div class="col-3 collapse d-md-flex border-left border-light px-0 bg-light" style="min-height: 100vh">
          {{-- <div class="list-group-flush list-group mt-1" style="width:100%">
             <a class="list-group-item list-group-item-light justify-content-between d-flex align-items-center bg-light" href="/Deduction/Codes/4c74c8be-5e61-49d9-b651-79301f974851">
                <div><i class="fa fa-money-check text-dark"></i> Deduction codes</div>
                <span class="badge badge-primary">3</span>
             </a>
             <a href="#sbBilling" data-toggle="collapse" class="list-group-item justify-content-between  d-flex align-items-center list-group-item-secondary" data-target="#sbBilling">
                <div>Billing</div>
                <span class="dropdown-toggle"></span>
             </a>
             <div class="show list-group list-group-flush mt-1 mb-1 pl-3 bg-light" id="sbBilling">
                <a class="list-group-item py-2" href="/Billing/Invoices/4c74c8be-5e61-49d9-b651-79301f974851"><i class="fa fa-file-invoice-dollar text-dark"></i> Invoices</a>
                <a class="list-group-item py-2" href="/Billing/Payments/4c74c8be-5e61-49d9-b651-79301f974851"><i class="fa fa-money-check-alt text-dark"></i> Payments</a>
                <a class="list-group-item py-2" href="/Billing/CreditNotes/4c74c8be-5e61-49d9-b651-79301f974851"><i class="fa fa-sticky-note text-dark"></i> Credit notes</a>
                <a class="list-group-item py-2" href="/Billing/Statement/4c74c8be-5e61-49d9-b651-79301f974851"><i class="fa fa-list-alt text-dark"></i> Account statement</a>
             </div>
             <a class="list-group-item list-group-item-light justify-content-between d-flex align-items-center bg-light" href="/Config/Users/4c74c8be-5e61-49d9-b651-79301f974851">
                <div><i class="fa fa-users-cog text-dark"></i> Users</div>
                <span class="badge badge-primary">6</span>
             </a>
             <a class="list-group-item list-group-item-light justify-content-between d-flex align-items-center bg-light" href="/Config/Users/Add?id=4c74c8be-5e61-49d9-b651-79301f974851">
                <div><i class="fa fa-user-plus text-dark"></i> Add new user..</div>
             </a>
             <a class="list-group-item list-group-item-light justify-content-between d-flex align-items-center bg-light" href="/Files/4c74c8be-5e61-49d9-b651-79301f974851">
                <div><i class="fa fa-folder text-dark"></i> Misc. files</div>
             </a>
             <a class="list-group-item list-group-item-light justify-content-between d-flex align-items-center bg-light" href="/Organizations/Approvals/4c74c8be-5e61-49d9-b651-79301f974851">
                <div><i class="fa fa-signature text-dark"></i> Approval profiles</div>
             </a>
             <div>&nbsp;</div>
          </div> --}}
       </div>
    </div>
 </main>

 @endsection
