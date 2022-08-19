<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CorporateController extends Controller
{
    //
    public function index(){
        $total_rejctd = DB::select("select count(*) as ttl from deduction where request_status = 2");
        $total_apprvd = DB::select("select count(*) as ttl from deduction where request_status = 1");
        $total_pending = DB::select("select count(*) as ttl from deduction where request_status = 0");

        return view('dashboards.corporate.index',[
            'total_rejctd'=> $total_rejctd,
            'total_apprvd'=> $total_apprvd,
            'total_pending'=> $total_pending
        ]);
    }

    public function list_deduction(){
        $deductions = DB::select("select * from deduction ");
        $total_req = DB::select("select count(*) as ttl from deduction");
        return view('dashboards.corporate.list-deduction', [
            'deductions'=>$deductions,
            'total'=> $total_req
        ]);
    }

    public function deduction_detail(Request $request){

        $deduction = DB::select("select * from deduction where record_ID = '$request->record_ID' ");
        return view('dashboards.corporate.deduction-detail', [
            'deduction'=>$deduction,
        ]);
    }

    public function add_deduction(Request $request){

        return view('dashboards.corporate.add-deduction');
    }

    public function save_deduction(Request $request){

        $deduction_code = $request->input('DeductionCode');
        $deduction_bankid = $request->input('BankId');
        $deduction_accnumber = $request->input('AccNumber');
        $deduction_name = $request->input('Name');
        $deduction_refence = $request->input('Reference');
        $deduction_amount = $request->input('Amount');
        //$deduction_amount = $request->input('Amount');
        $deduction_type = $request->input('Type');
        $deduction_ecnumber = $request->input('EcNumber');
        $deduction_idnumber = $request->input('IdNumber');
        $deduction_startdate = $request->input('StartDate');
        $deduction_enddate = $request->input('EndDate');
        $deduction_surname = $request->input('Surname');
        $deduction_wagetypeid = $request->input('WageTypeId');
        $deduction_paymentmethod = $request->input('PaymentMethod');

        //dd($deduction_type);

        if($deduction_type == "NEW"){
            $req_type = 0;
        }elseif($deduction_type == "CHANGE"){
            $req_type = 1;
        }else{
            $req_type = 2;
        }


        DB::insert('insert into deduction (code, request_type, ec_number, id_number, transaction_reference, deductions_start_date, deductions_end_date, installment_amount, first_name, last_name) values(?,?,?,?,?,?,?,?,?,?)',[$deduction_code, $req_type, $deduction_ecnumber, $deduction_idnumber, $deduction_refence, $deduction_startdate, $deduction_enddate,  $deduction_amount, $deduction_name, $deduction_surname ]);
        return redirect()->route('corporate.add_deduction')->with('status', 'Deduction added successfully!');

    }

    public function import_deduction(){
        return view('dashboards.corporate.import-deduction');
    }

    public function save_import_deduction(Request $request){
        $file = $request->file('file');
        $Code_id = $request->input('CodeId');

        if ( $file && $Code_id ) {
            //dd($file_path);
            $fileName = time().'_'.request()->file->getClientOriginalName();
            request()->file('file')->storeAs('batchs', $fileName, 'public');

            DB::insert('insert into batchs (code, batch) values(?,?)',[$Code_id, $file]);

            return redirect()->route('corporate.import_deduction')->with('success', 'File uploaded successfully!');

        }else{
            return redirect()->route('corporate.import_deduction')->with('fail', 'Failed to upload!');
        }


        // Excel::import(new UsersImport, request()->file('file'));
        // return redirect()->back()->with('success','Data Imported Successfully');
    }

    public function rejected_deduction(){
        $rejected = DB::select("select * from deduction where request_status = 2");
        $total_req = DB::select("select count(*) as ttl from deduction where request_status = 2");
        return view('dashboards.corporate.rejected-deduction',[
            'approved'=>$rejected,
            'total'=> $total_req
        ]);
    }

    public function rejected_deduction_detail(Request $request){
        $rejected_detail = DB::select("select * from deduction where request_status = 2 and record_ID = '$request->record_ID'");
        return view('dashboards.corporate.rejected-deduction-detail',[
            'rejected_detail'=>$rejected_detail,
        ]);
    }

    public function approved_deduction(){

        $approved = DB::select("select * from deduction where request_status = 1");
        $total_req = DB::select("select count(*) as ttl from deduction where request_status = 1");
        return view('dashboards.corporate.aproved-deduction',[
            'approved'=>$approved,
            'total'=> $total_req
        ]);
    }

    public function approved_deduction_detail(Request $request){
        $approved_detail = DB::select("select * from deduction where request_status = 1 and record_ID = '$request->record_ID'");
        return view('dashboards.corporate.approved-deduction-detail',[
            'approved_detail'=>$approved_detail,
        ]);
    }

    public function pending_deduction(){

        $approved = DB::select("select * from deduction where request_status = 0");
        $total_req = DB::select("select count(*) as ttl from deduction where request_status = 0");

        return view('dashboards.corporate.pending-deduction',[
            'approved'=>$approved,
            'total'=> $total_req
        ]);
    }

    public function pending_deduction_detail(Request $request){
        $approved_detail = DB::select("select * from deduction where request_status = 0 and record_ID = '$request->record_ID'");
        return view('dashboards.corporate.pending-deduction-detail',[
            'approved_detail'=>$approved_detail,
        ]);
    }

    public function destroy_deduction(Request $request) {
        DB::delete('delete from deduction where record_ID = ?',[$request->record_ID]);
        return redirect('/corporate/deductions')->with('error', 'Record deleted successfully');
    }

    public function update_deduction(Request $request)
    {

        if ($request->isMethod('GET')) {
            $deduction = DB::select("select * from deduction where record_ID = '$request->record_ID'");
            return view('dashboards.corporate.update_deduction',[
                'deduction'=>$deduction,
            ]);

        }


        if ($request->isMethod('POST')) {
            $deduction_code = $request->input('DeductionCode');
            $deduction_bankid = $request->input('BankId');
            $deduction_accnumber = $request->input('AccNumber');
            $deduction_name = $request->input('Name');
            $deduction_refence = $request->input('Reference');
            $deduction_amount = $request->input('Amount');
            //$deduction_amount = $request->input('Amount');
            $deduction_type = $request->input('Type');
            $deduction_ecnumber = $request->input('EcNumber');
            $deduction_idnumber = $request->input('IdNumber');
            $deduction_startdate = $request->input('StartDate');
            $deduction_enddate = $request->input('EndDate');
            $deduction_surname = $request->input('Surname');
            $deduction_wagetypeid = $request->input('WageTypeId');
            $deduction_paymentmethod = $request->input('PaymentMethod');

            //dd($deduction_type);

            if($deduction_type == "NEW"){
                $req_type = 0;
            }elseif($deduction_type == "CHANGE"){
                $req_type = 1;
            }else{
                $req_type = 2;
            }
            //dd($request->record_ID);
            DB::update('update deduction set code=?,request_type=?,ec_number=?,id_number=?,transaction_reference=?,deductions_start_date=?, deductions_end_date=?, installment_amount=?,first_name=?,last_name=? where record_ID = ?',[$deduction_code, $req_type, $deduction_ecnumber, $deduction_idnumber, $deduction_refence, $deduction_startdate, $deduction_enddate,  $deduction_amount, $deduction_name, $deduction_surname, $request->record_ID]);
            return redirect('/corporate/deductions')->with('success', 'Record Updated successfully!');
        }


    }

    public function feedback(Request $request){
        $feedback = 'feedback';
        return view('dashboards.corporate.feedback',[
            'feedback'=>$feedback,
        ]);
    }

    public function search_records(Request $request){
        $search = $request->input('search');
        $deductions = DB::table('deduction')
                    ->where('ec_number', 'LIKE', "%{$search}%")
                    ->orWhere('code', 'LIKE', "%{$search}%")
                    ->orWhere('id_number', 'LIKE', "%{$search}%")
                    ->orWhere('transaction_reference', 'LIKE', "%{$search}%")
                    ->get();

        return view('dashboards.corporate.search_records',[
            'deductions'=>$deductions,
        ]);
    }
}
