<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    public function index(){
        $total_rejctd = DB::select("select count(*) as ttl from deduction where request_status = 2");
        $total_apprvd = DB::select("select count(*) as ttl from deduction where request_status = 1");
        $total_pending = DB::select("select count(*) as ttl from deduction where request_status = 0");

        $total_comp = DB::select("select count(*) as ttl from company");
        $total_ded = DB::select("select count(*) as ttl from deduction");



        return view('dashboards.company.index',[
            'total_comp'=> $total_comp,
            'total_ded'=> $total_ded,
            'total_rejctd'=>$total_rejctd,
            'total_apprvd'=>$total_apprvd,
            'total_pending'=>$total_pending,

        ]);
    }

    public function getCompany(){
        $all_users = DB::select('select * from users');
        return view('dashboards.company.getcompany',[
            'all_users'=>$all_users
        ]);
    }

    public function saveCompany(Request $request){
        $name = $request->input('name');
        $code  = $request->input('code');
        $description = $request->input('description');
        $owner = $request->input('owner');
        DB::insert('insert into company (name, code, description, user) values(?,?,?,?)',[$name, $code, $description, $owner]);
        return redirect('/company/get')->with('status', 'Record inserted successfully!');
    }
    public function viewCompany(){
        $companies = DB::select("select * from company ");
        return view('dashboards.company.view-companies', [
            'companies'=> $companies
        ]);
    }
    public function list_deduction(){
        $deductions = DB::select("select * from deduction where request_status = 0 LIMIT 1");
        return view('dashboards.company.list-deduction', [
            'deductions'=>$deductions,

        ]);
    }

    public function deduction_detail(Request $request){

        $deduction = DB::select("select * from deduction where record_ID = '$request->record_ID' ");
        return view('dashboards.company.deduction-detail', [
            'deduction'=>$deduction,
        ]);
    }

    public function update_status(Request $request)
    {

        if ($request->isMethod('GET')) {
            $deduction = DB::select("select * from deduction where record_ID = '$request->record_ID'");
            $status = DB::select("select * from request_status");
            return view('dashboards.company.update_status',[
                'status'=> $status,
                'deduction'=> $deduction
            ]);
        }

        if ($request->isMethod('POST')) {

            $status = number_format($request->input('status'));
            // $check_data = DB::select("select * from deduction WHERE request_status = 0 LIMIT 1");
            // $check_recordID = $check_data[0]->record_ID;
            // $check_status = $check_data[0]->request_status;

            DB::update('update deduction set request_status=? where record_ID=?',[$status, $request->record_ID]);
            return redirect('/company/deductions')->with('success', 'Record Updated successfully!');
        }


    }

    public function list(){
        $deductions = DB::select("select * from deduction");
        return view('dashboards.company.list', [
            'deductions'=>$deductions,

        ]);
    }

    public function pending_deduction(){

        $approved = DB::select("select * from deduction where request_status = 0");
        $total_req = DB::select("select count(*) as ttl from deduction where request_status = 0");

        return view('dashboards.company.pending-deduction',[
            'approved'=>$approved,
            'total'=> $total_req
        ]);
    }

    public function approved_deduction(){

        $approved = DB::select("select * from deduction where request_status = 1");
        $total_req = DB::select("select count(*) as ttl from deduction where request_status = 1");
        return view('dashboards.company.aproved-deduction',[
            'approved'=>$approved,
            'total'=> $total_req
        ]);
    }

    public function rejected_deduction(){
        $rejected = DB::select("select * from deduction where request_status = 2");
        $total_req = DB::select("select count(*) as ttl from deduction where request_status = 2");
        return view('dashboards.company.rejected-deduction',[
            'approved'=>$rejected,
            'total'=> $total_req
        ]);
    }

    public function search(Request $request){

        $search = $request->input('search');

        $companies = DB::table('company')
                    ->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('code', 'LIKE', "%{$search}%")
                    ->get();

        return view('dashboards.company.search',[
            'companies'=>$companies,
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

        return view('dashboards.company.search_records',[
            'deductions'=>$deductions,
        ]);
    }

    public function destroy_deduction(Request $request) {
        DB::delete('delete from company where id = ?',[$request->id]);
        return redirect('/company/companies')->with('success_delete', 'Record deleted successfully');
    }


}
