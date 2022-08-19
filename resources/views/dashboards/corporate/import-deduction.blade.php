
@extends('layouts.corporate.index')

@section('content')
<main role="main" class="pb-3">
    <div class="navbar navbar-expand-lg px-0 navbar-dark my-3 d-print-none">
       <h3>Import bulk records</h3>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('fail'))
        <div class="alert alert-danger">
            {{ session('fail') }}
        </div>
    @endif
    <div class="d-print-block">
       <div class="card">
          <div class="card-body">
            <form method="POST" action="{{route('corporate.save_import_deduction')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                   <label class="col-md-4">Deduction code</label>
                   <div class="col-md-8">
                      <select class="form-control" data-bind="options:Codes,optionsText:'Description',optionsCaption:'Select...',value:SelectedCode,disable:ReadCode">
                      </select>
                      <input type="hidden" required data-bind="value:CodeId" id="CodeId" name="CodeId" value="" />
                      <!--ko if:(SelectedCode() && (IsSSB() || IsZapar()) || Employer())-->
                      <div class="mt-2">
                         <label class="mb-0"><input data-bind="checked:ReadCode" type="checkbox" data-val="true" data-val-required="The ReadCode field is required." id="ReadCode" name="ReadCode" value="true" /> Read deduction code from imported file..</label>
                         <div class="small text-muted">(NOTE: Only one deduction code supported per file)</div>
                      </div>
                      <!--/ko-->
                      <span class="text-danger field-validation-valid" data-valmsg-for="CodeId" data-valmsg-replace="true"></span>
                   </div>
                </div>
                <!--ko if:SelectedCode() || Employer() -->
                <div class="form-group row">
                   <label class="col-md-4">Ignore errors in files</label>
                   <div class="col-md-8"><input type="checkbox" data-bind="checked:IgnoreErrors" data-val="true" data-val-required="The IgnoreErrors field is required." id="IgnoreErrors" name="IgnoreErrors" value="true" /></div>
                </div>
                <!--/ko-->
                <div class="form-group row">
                   <label class="col-md-4">Select file</label>
                   <div class="col-md-8">
                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="file" accept=".csv,.xlsx,.ins,.dat,.txt">
                </div>

                <div class="card-footer">
                    <button class="btn btn-success" ><i class="fa fa-save"></i>&nbsp;Upload</button>
                 </div>
            </form>
          </div>
          <!--ko if:Files().length>0-->
          {{-- <div class="p-3">
             <!--ko if:Files().length!=ProcessedFiles()-->
             <div class="text-danger h4 my-3">Processing of files is now in progress. Please do not close this window or navigate away!</div>
             <a href="/Deduction/Import" class="btn btn-danger btn-sm mr-2">Cancel upload..</a>
             <small class="text-muted">Note: Canceling files already sent to the server might not succeed. Please verify your pending batches after canceling</small>
             <!--/ko-->
             <div class="h5">Overall progress: <span class="font-weight-bold" data-bind="text:totalProgress()"></span></div>
             <div class="progress mb-2" style="height:30px">
                <div class="progress-bar progress-bar-animated progress-bar-striped bg-success" role="progressbar" data-bind="style:{width: totalProgress()}" aria-valuemin="0" aria-valuemax="100">&nbsp;</div>
             </div>
             <!--ko if:Files().length>1 && ErrorFilesCount()>0-->
             <div class="py-3">
                Files with errors: <strong data-bind="text:ErrorFilesCount"></strong>/<strong data-bind="text:Files().length"></strong>
             </div>
             <!--/ko-->
          </div>
          <table class="table table-sm table-striped mb-0">
             <thead>
                <tr>
                   <th>File name</th>
                   <th>Size</th>
                   <th>Load progress</th>
                   <th>Deduction code</th>
                   <th>Imported records</th>
                   <th>Total amount</th>
                   <th>Errors</th>
                   <th></th>
                </tr>
             </thead>
             <tbody data-bind="foreach:Files">
                <tr>
                   <td data-bind="text:FileData.name"></td>
                   <td data-bind="text:FileData.size.fileSize()"></td>
                   <td>
                      <div class="progress">
                         <div class="progress-bar" role="progressbar" data-bind="style:{width: UploadProgress()+'%'}" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">&nbsp;</div>
                      </div>
                   </td>
                   <!--ko if: Result-->
                   <td data-bind="text:Result().code"></td>
                   <td data-bind="text:Result().recordsCount"></td>
                   <td data-bind="text:Result().amount"></td>
                   <td data-bind="text:Result().errorsCount"></td>
                   <!--/ko-->
                   <td>
                      <span data-bind="html: StatusHtml"></span>
                      <!--ko if:HasErrors-->
                      <button class="btn btn-sm btn-outline-primary" data-bind="click:Download"><i class="fa fa-download"></i> Download error file</button>
                      <!--/ko-->
                   </td>
                </tr>
             </tbody>
          </table> --}}
          <!--/ko-->
       </div>
       <!--ko if:Files().length>1-->
       {{-- <div class="row mt-3">
          <div class="col">
             <!--ko if:ErrorFilesCount()>0-->
             <button class="btn btn-warning mt-3" data-bind="click:DownloadErrorReport">Download error report</button>
             <!--/ko-->
             <button class="btn btn-secondary mt-3" data-bind="click:DownloadReport">Download report</button>
          </div>
       </div> --}}
       <!--/ko-->
       {{-- <div class="mt-4">
          <!--ko if:SelectedCode-->
          <!--ko if:!IsBulkPayment() && !IsZambia()-->
          Accepted file formats are:
          <ul>
             <li>CSV</li>
             <li>Excel (<strong>.xlsx format only</strong>)</li>
             <li>SSB ins file</li>
          </ul>
          <p>
             Excel and CSV files should have the following column order:
          <ol type="A">
             <li>Reference</li>
             <li>ID number</li>
             <li>EC number</li>
             <li>Transaction type (<strong>n / c / d</strong> or <strong>NEW / CHANGE / DELETE</strong>)</li>
             <li>Start date (preferred formats: 31/Jan/2020 or 2020/01/31, 20200131, 31012020)</li>
             <li>End date</li>
             <li>Amount (<strong>in cents</strong>)</li>
             <li>Deduction code (<strong>optional</strong>)</li>
             <li>Total amount (<strong>in cents, Optional</strong>)</li>
             <li>Name (<strong>optional</strong>)</li>
             <li>Surname (<strong>optional</strong>)</li>
          </ol>
          First row should have column headers but should not necessarily match the text above.
          </p>
          <div><a target="_blank" href="/templates/import-samples.zip">Click here</a> to download sample files</div>
          <!--/ko-->
          <!--ko if:IsBulkPayment()-->
          Accepted file formats:
          <ul>
             <li>Excel (<strong>.xlsx format only</strong>)</li>
          </ul>
          <p>
             Excel files should have the following column order:
          <ol>
             <li>Account number</li>
             <li>Account name (<strong>optional</strong>)</li>
             <li>Bank swift code</li>
             <li>Reference</li>
             <li>Amount (<strong>in dollars and cents</strong>)</li>
          </ol>
          First row should have column headers but should not necessarily match the text above.
          </p>
          <p>
          <h5>Supported bank swift codes:</h5>
          <ul class="small">
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">AFCNZWHA</span> <i class="fa fa-arrow-right"></i> African Century</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">AGRZZWHA</span> <i class="fa fa-arrow-right"></i> Agribank</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">FMBZZWHX</span> <i class="fa fa-arrow-right"></i> BancABC</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">CABSZWHA</span> <i class="fa fa-arrow-right"></i> CABS</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold"> COBZZWHA</span> <i class="fa fa-arrow-right"></i> CBZ Bank</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">ECOCZWHX</span> <i class="fa fa-arrow-right"></i> Ecobank</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold"> EMPWZWHX</span> <i class="fa fa-arrow-right"></i> Empowerbank</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold"> FBCPZWHA</span> <i class="fa fa-arrow-right"></i> FBC Bank</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">BARCZWHX</span> <i class="fa fa-arrow-right"></i> First Capital Bank Limited</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">GBSPZWHA</span> <i class="fa fa-arrow-right"></i> Getbucks</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">MBOZZWHA</span> <i class="fa fa-arrow-right"></i> Metbank</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">NABYZWHA</span> <i class="fa fa-arrow-right"></i> National Building Society</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">MBCAZWHX</span> <i class="fa fa-arrow-right"></i> Nedbank</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold"> NMBLZWHX</span> <i class="fa fa-arrow-right"></i> NMB</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold"> PWSBZWHX</span> <i class="fa fa-arrow-right"></i> POSB</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">SBICZWHX</span> <i class="fa fa-arrow-right"></i> Stanbic</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold"> SCBLZWHX</span> <i class="fa fa-arrow-right"></i> Standard Chartered bank</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">STBLZWHX</span> <i class="fa fa-arrow-right"></i> Steward bank</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">SMFBZWHA</span> <i class="fa fa-arrow-right"></i> Success Microfinance bank</li>
             <li><span style="width:16ch; display:inline-block" class="font-weight-bold">ZBCOZWHX</span> <i class="fa fa-arrow-right"></i> ZB</li>
          </ul>
          </p>
          <!--/ko-->
          <!--ko if:IsZambia()-->
          Accepted file formats:
          <ul>
             <li>Excel (<strong>.xlsx format only</strong>)</li>
          </ul>
          <p>
             Excel files should have the following column order:
          <ol type="A">
             <li><i>(Leave blank)</i></li>
             <li>EMPLOYEE NUMBER</li>
             <li>NEW WAGE TYPE</li>
             <li>END DATE</li>
             <li>START DATE</li>
             <li>INSTALLMENT (<strong>in Kwacha and Ngwee</strong>)</li>
             <li>PAYEE KEY</li>
             <li>PAYMENT METHOD (<strong>ELECTRONIC/CHEQUE</strong>)</li>
             <li>FIRST NAME</li>
             <li>LAST NAME</li>
             <li>NRC</li>
          </ol>
          First row should have column headers but should not necessarily match the text above.
          </p>
          <div><a target="_blank" href="/import-samples/Zambia-PMEC-Sample.xlsx"><i class="fade fa-file-download text-black"></i> Click here</a> to download sample file</div>
          <!--/ko-->
          <!--/ko-->
       </div> --}}
    </div>
 </main>

 @endsection


 @section('scripts')
<script src="{{ asset('ssb/js/knockout-min.js') }}"></script>
<script src="{{ asset('ssb/js/jquery.ui.widget.js')}}"></script>
<script src="{{ asset('ssb/js/jquery.fileupload.js')}}"></script>

<script type="text/javascript">
    Object.defineProperty(Number.prototype, 'fileSize', {
        value: function (a, b, c, d) {
            return (a = a ? [1e3, 'k', 'B'] : [1024, 'K', 'iB'], b = Math, c = b.log,
                d = c(this) / c(a[0]) | 0, this / b.pow(a[0], d)).toFixed(2)
                + ' ' + (d ? (a[1] + 'MGTPEZY')[--d] + a[2] : 'Bytes');
        }, writable: false, enumerable: false
    });

    function download(data, filename, type) {
        var file = new Blob([data], { type: type });
        if (window.navigator.msSaveOrOpenBlob) // IE10+
            window.navigator.msSaveOrOpenBlob(file, filename);
        else { // Others
            var a = document.createElement("a"),
                url = URL.createObjectURL(file);
            a.href = url;
            a.download = filename;
            document.body.appendChild(a);
            a.click();
            setTimeout(function () {
                document.body.removeChild(a);
                window.URL.revokeObjectURL(url);
            }, 0);
        }
    }

    function FileInfo(data) {
        var self = this;
        self.FileData = data;
        self.UploadProgress = ko.observable(0);
        self.isEqual = function (data) {
            return data.name == self.FileData.name && data.size == self.FileData.size && self.FileData.type == data.type;
        }
        self.Result = ko.observable();
        self.StatusHtml = ko.computed(function () {
            if (self.Result() == null) return "<i class='fa fa-spinner fa-spin'></i> <small>Uploading (" + Math.round(self.UploadProgress()) + "%)</small>";
            if (self.Result().error) return "<i class='text-danger fa fa-times-circle'></i><small> Errors found</small>";
            if (self.Result().recordsCount > 0) return "<i class='text-success fa fa-check-circle'></i> Successfully imported!";
            return "<i class='text-warning fa fa-exclamation-triangle'></i>";
        });

        self.HasErrors = ko.computed(function () { return self.Result() != null && self.Result().error != null; });

        self.Download = function () {
            download(self.Result().error, self.FileData.name + "-errors.txt", "text/plain");
        }
    }

    function UploadViewModel() {
        var self = this;
        self.SentFiles = ko.observable(0);
        self.UploadedFiles = ko.observable(0);
        self.ProcessedFiles = ko.observable(0);
        self.Codes = ko.observableArray([{"Id":1733,"Code":"800184005","Description":"800184005 - Kuntem (USD)","TypeId":1,"CurrencyId":"USD"},{"Id":779,"Code":"0533","Description":"0533 - Kuntem Traders (ZWL)","TypeId":6,"CurrencyId":"ZWL"},{"Id":237,"Code":"800081451","Description":"800081451 - Kuntem Traders Pvt Ltd (ZWL)","TypeId":1,"CurrencyId":"ZWL"}]);
        self.Employer=ko.observable("");
        self.ReadCode = ko.observable(false);
        self.IgnoreErrors = ko.observable();
        self.Files = ko.observableArray([]);
        self.CodeId = ko.observable();
        self.addFile = function (data) {
            self.Files.push(new FileInfo(data.files[0]))
        }

        self.DownloadReport=function(){
            var data="File name,Code,Imported code,Errors found\r\n";
            self.Files().sort((a,b)=>{
                return a.Result() && b.Result() && a.Result().errorsCount>b.Result().errorsCount;
            });
            self.Files().forEach(item=>{
                data+=item.FileData.name.replace(",", " ")+",";
                if(item.Result()){
                    data+=item.Result().code+","+item.Result().recordsCount+","+item.Result().errorsCount;
                }
                data+="\r\n";
            });
            download(data, "Import-Report.csv", "text/plain");
        }

        self.DownloadErrorReport=function(){
            var data="";
            self.Files().sort((a,b)=>{
                return a.Result() && b.Result() && a.Result().errorsCount>b.Result().errorsCount;
            });
            self.Files().forEach(item=>{
                if(item.HasErrors()) data+= item.FileData.name.replace(",", " ")+"\r\n"+item.Result().error+"\r\n";
            });
            download(data.replace("\t",", "), "Error-Report.csv", "text/plain");
        }

        self.ErrorFilesCount=ko.computed(function(){
            var count=0;
            self.Files().forEach(item=>{
                if(item.HasErrors()) count++;
            });
            return count;
        });

        self.SelectedCode = ko.observable();
        self.SelectedCode.subscribe(function () {
            if (self.SelectedCode()) {
                self.CodeId(self.SelectedCode().Id);
            }
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


        self.updateProgress = function (data, progress) {
            for (var i = self.Files().length - 1; i >= 0; i--) {
                if (self.Files()[i].isEqual(data.files[0])) {
                    if (self.Files()[i].UploadProgress() < 100 && progress >= 100) {
                        self.SentFiles(self.SentFiles() + 1);
                    }
                    self.Files()[i].UploadProgress(progress);
                    break;
                }
            }
        };

        self.updateResult = function (data) {
            for (var i = self.Files().length - 1; i >= 0; i--) {
                if (self.Files()[i].isEqual(data.files[0])) {
                    self.Files()[i].Result(data.result);
                    break;
                }
            }
        };

        self.totalProgress = function () {
            if (self.Files().length == 0) return "0%";
            var count = 0;
            var uploaded = 0;
            for (var i = self.Files().length - 1; i >= 0; i--) {
                if (self.Files()[i].Result() != null) {
                    count++;
                    if (self.Files()[i].Result().error == null && self.Files()[i].Result().recordsCount > 0)
                        uploaded++;
                }
            }
            self.ProcessedFiles(count);
            self.UploadedFiles(uploaded);
            return Math.round(count * 100 / self.Files().length) + "%";
        };
    }
    var UploadVM = new UploadViewModel();
    $(document).ready(function () {
        $("#fileupload").fileupload({
            headers: { "RequestVerificationToken": $('input:hidden[name="__RequestVerificationToken"]').val() },
            add: function (e, data) {
                data.submit();
                UploadVM.addFile(data);
            },
            progress: function (e, data) {
                var progress = parseInt((data.loaded / data.total) * 100, 10);
                UploadVM.updateProgress(data, progress);
            },
            done: function (e, data) {
                UploadVM.updateResult(data);
            },
            submit: function (e, data) {
                if (!UploadVM.CodeId() && !UploadVM.ReadCode()) {
                    alert("Please select deduction code!");
                    return false;
                }
                data.formData = {
                    "Id": UploadVM.CodeId(),
                    "IgnoreErrors": UploadVM.IgnoreErrors(),
                    "ReadCode": UploadVM.ReadCode(),
                    "PaymasterId": UploadVM.Employer()
                };
            }
        });

        ko.applyBindings(UploadVM);
    })
 </script>
@stop
