@extends('layouts.company.index')

@section('content')

<main role="main">
    <div class="row d-print-none">
       <div class="col pb-3">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
          <div class="navbar navbar-expand-lg px-0 my-3">
             <h3>Update Request Status</h3>
             {{-- <div class="ml-auto" style="">
                <a class="btn btn-primary" href="{{route('corporate.import_deduction')}}"><i class="fa fa-file-import"></i>&nbsp;Import bulk records..</a>
             </div> --}}

          </div>
          <div class="d-print-block">
            @foreach ($deduction as $item)
            <form method="POST" action="{{route('company.update_status', ['record_ID' => $item->record_ID])}}">
                @csrf
                <div class="card">
                   <div class="card-body">
                        <div class="form-group row">
                            <label class="col-md-4">Request type<i class="text-danger">*</i></label>
                            <div class="col-md-4">
                                <select class="form-control" data-bind="value:ReqType" required id="DeductionRq_Type" name="status">

                                @foreach ($status as $st)
                                    <option value="{{$st->id}}">{{$st->name}}</option>
                                @endforeach

                                </select>
                                <span class="text-danger field-validation-valid" data-valmsg-for="Type" data-valmsg-replace="true"></span>
                            </div>
                        </div>
                    </div>
                   <!--ko if:Code-->
                   <div class="card-footer">
                      <button class="btn btn-success" data-bind="enable:IsValid"><i class="fa fa-save"></i>&nbsp;Save</button>
                   </div>

                </div>
             </form>
            @endforeach

          </div>
       </div>
       <div class="col-3 collapse d-md-flex border-left border-light px-0 bg-light" style="min-height: 100vh">
          <div></div>
       </div>
    </div>
 </main>

 @endsection


 @section('scripts')
<script src="{{ asset('ssb/js/knockout-min.js') }}"></script>
<script type="text/javascript">

    function ViewModel() {
        var self = this;
        self.Codes = ko.observableArray([{"Id":1733,"Code":"800184005","Description":"800184005 - Kuntem (USD)","TypeId":1,"CurrencyId":"USD"},{"Id":779,"Code":"0533","Description":"0533 - Kuntem Traders (ZWL)","TypeId":6,"CurrencyId":"ZWL"},{"Id":237,"Code":"800081451","Description":"800081451 - Kuntem Traders Pvt Ltd (ZWL)","TypeId":1,"CurrencyId":"ZWL"}]);
        self.Banks = ko.observableArray([{"Id":"95ecf898-8302-4211-a0ff-539c303a3162","Name":"African Century","AccountNoFormat":"\\d{10}"},{"Id":"040598d4-4d79-45e8-abd0-bdb2ec7684ff","Name":"Agribank","AccountNoFormat":"\\d{16}"},{"Id":"eca563e4-cff8-4f43-908f-c130a6d6751d","Name":"CBZ Bank","AccountNoFormat":"\\d{14}"},{"Id":"73446614-6b16-4d66-a4c6-98017f9e55be","Name":"Ecobank","AccountNoFormat":"\\d{13}"},{"Id":"7d0aa094-ddcd-4e26-9d60-0b138f935751","Name":"Empowerbank","AccountNoFormat":"\\d{12}"},{"Id":"a305aebf-e19b-4042-944a-d9d42daf04d9","Name":"FBC Bank","AccountNoFormat":"\\d{16}"},{"Id":"9ef877b0-a35d-46e6-a69d-26baee83d7da","Name":"Getbucks","AccountNoFormat":"\\d{14}"},{"Id":"24b4db2d-32c5-4d71-bc39-03203ad74947","Name":"Nedbank","AccountNoFormat":"\\d{12}"},{"Id":"fedaae4e-d237-40c7-94be-0ad40a0151f8","Name":"Metbank","AccountNoFormat":"\\d{16}"},{"Id":"2f688824-05aa-4e41-8dec-417f589d0b38","Name":"NMB","AccountNoFormat":"\\d{13}"},{"Id":"0d30d466-c3b0-4e99-aaa7-5113196131ba","Name":"POSB","AccountNoFormat":"\\d{12}"},{"Id":"ccc3dd28-4663-4142-851b-9f81dccac0cf","Name":"Stanbic","AccountNoFormat":"\\d{13}"},{"Id":"752651b8-2e72-4da9-b472-5209a75cf8e1","Name":"Standard Chartered bank","AccountNoFormat":"\\d{13}"},{"Id":"11048731-de9c-453b-ad1f-cdf5bbc38844","Name":"Success Microfinance bank","AccountNoFormat":"\\d{12}"},{"Id":"e1f7b7cd-efad-49bf-86cd-982d328b7cd2","Name":"Steward bank","AccountNoFormat":"\\d{10}"},{"Id":"e2746b5a-3a24-4bea-a4ff-5f02b90fd7ee","Name":"National Building Society","AccountNoFormat":"\\d{13}"},{"Id":"95be3e70-8243-4619-8c20-444505238e9a","Name":"CABS","AccountNoFormat":"\\d{10}"},{"Id":"3fb0f0bd-bbfb-4ddc-9abb-4523119613e1","Name":"BancABC","AccountNoFormat":"\\d{17}"},{"Id":"665fcb39-a6a6-4cfc-968e-059c4afae5d0","Name":"First Capital Bank Limited","AccountNoFormat":"\\d{11}"},{"Id":"d8e6d5a7-7c38-4f4e-8fb7-0f50930a1e5f","Name":"ZB","AccountNoFormat":"\\d{13}"}]);
        self.Code = ko.observable('');
        self.BankId = ko.observable();
        self.Bank = ko.observable();
        self.Interbank = ko.observable(false);
        self.ReqType = ko.observable();
        self.BankAccFormat = ko.observable();
        self.AccNo = ko.observable("");
        self.Amount = ko.observable();
        self.SelectedCode = ko.observable();
        self.SelectedCode.subscribe(function () {
            if (self.SelectedCode()) {
                self.Code(self.SelectedCode().Code);
                self.BankId(self.SelectedCode().BankId);
                self.Interbank(self.SelectedCode().AllowInterbankDebits == true);
            }
        });

        self.Bank.subscribe(function () {
            if (self.Bank()) {
                self.BankId(self.Bank().Id);
                self.BankAccFormat(self.Bank().AccountNoFormat);
            }
            else self.BankId(null);
        });


        self.IsSSB = function () {
            return self.SelectedCode() && self.SelectedCode().TypeId == 1;
        };

        self.IsZapar = function () {
            return self.SelectedCode() && self.SelectedCode().TypeId == 3;
        };

        self.IsPrivate = function () {
            return self.SelectedCode() && self.SelectedCode().TypeId == 4;
        };

        self.IsDirectDebit = function () {
            return self.SelectedCode() && self.SelectedCode().TypeId == 5;
        };

        self.IsPensions = function () {
            return self.SelectedCode() && self.SelectedCode().TypeId == 6;
        };

        self.IsZambia = ko.computed(function () {
            return self.SelectedCode() && self.SelectedCode().TypeId == 7;
        });

        self.IsBulkPayment = ko.computed(function () {
            return self.SelectedCode() && self.SelectedCode().TypeId == 8;
        });

        self.IsValid = ko.computed(function () {
            if (self.IsBulkPayment()) {
                return self.BankId() && self.AccNo() && new RegExp(self.BankAccFormat()).test(self.AccNo());
            }
            return true;
        });

        self.IsInvalidAcc = ko.computed(function () {
            return self.AccNo() && !new RegExp(self.BankAccFormat()).test(self.AccNo());
        });

        self.AmountInCur = ko.computed(function () {
            return self.Amount() && self.Code() ? accounting.formatMoney(self.Amount() * 1 / 100, { symbol: self.SelectedCode().CurrencyId, format: "%s %v" }) : null;;
        })

        self.IsDelete = ko.computed(function () { return self.ReqType() == "DELETE"; })
    }

    $(document).ready(function () {
        ko.applyBindings(new ViewModel());
        $(".date").datepicker({
            dateFormat: "yy-mm-dd",
            constrainInput: true,
            minDate: new Date(2022, 6, 1),
        });
        $("#DeductionRq_Type").change(function () {
            var type = $("#DeductionRq_Type").val();
            if (type == "NEW" || type == "CHANGE") {
                $("#DeductionRq_StartDate").attr("required", true);
            }
            else {
                $("#DeductionRq_StartDate").removeAttr("required");
            }
        })
    });

    function SetDates(obj) {
        $(obj).datepicker({
            dateFormat: "yy-mm-dd",
            constrainInput: true,
            minDate: new Date(2022, 6, 1),
        });
        $(obj).datepicker('show');
    }

    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
@stop
