<?php

namespace App\Http\Controllers;

use App\FinanceInfo;
use App\Sector;
use App\Company;
use Illuminate\Http\Request;

class FinanceInfoController extends Controller
{
    public function all(){
        $sectors = Sector::all();
        $companies = Company::all();
        $finance_infos = FinanceInfo::all();
        $frequency = null;
        $q1 = null;
        $q2 = null;
        $q3 = null;
        $q4 = null;
        return view('front-end.finance-info.all', compact('finance_infos', 'sectors', 'companies','frequency','q1','q2','q3','q4'));
    }

    public function financeFilter(Request $request)
    {
        $sectors = Sector::all();
        $companies = Company::all();
        $finance_infos = FinanceInfo::where('company_id', 'LIKE', "%$request->company%")->get();
        if($request->frequency == 'yearly'){
           $frequency = 'yearly';
        }elseif($request->frequency == 'quarterly'){
            $frequency = 'quarterly';
        }else{
            $frequency = null;
        }
        $q1 = $request->q1;
        $q2 = $request->q2;
        $q3 = $request->q3;
        $q4 = $request->q4;
        // dd($finance_infos);
        return view('front-end.finance-info.all', compact('finance_infos','sectors','companies','frequency','q1','q2','q3','q4'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'year' => 'required|numeric',
            'company_id' => 'required'
        ]);

        $financeInfo = FinanceInfo::where('year', $request->get('year'))->where('company_id', $request->get('company_id'))->first();
        if($financeInfo){
            return redirect()->back()->withErrors(['Financial info for this year already exist, please update that.']);
        }

        $financeInfo = FinanceInfo::create(
            [
                'year' => $request->get('year'), 
                'company_id' => $request->get('company_id'),
                'annual_excel_url' => '#',
                'annual_pdf_1_url' => '#',
                'annual_pdf_2_url' => '#',
                'annual_pdf_3_url' => '#',
                'annual_pdf_4_url' => '#',
                'annual_pdf_5_url' => '#',
                'q1__pdf_url' => '#',
                'q1_excel_url' => '#',
                'q2__pdf_url' => '#',
                'q2_excel_url' => '#',
                'q3__pdf_url' => '#',
                'q3_excel_url' => '#',
                'q4__pdf_url' => '#',
                'q4_excel_url' => '#',
                'annual_excel_download_count' => 0 ,
                'annual_pdf_1_download_count' => 0 ,
                'annual_pdf_2_download_count' => 0 ,
                'annual_pdf_3_download_count' => 0 ,
                'annual_pdf_4_download_count' => 0 ,
                'annual_pdf_5_download_count' => 0 ,
                'q1__pdf_download_count' => 0 ,
                'q1_excel_download_count' => 0 ,
                'q2__pdf_download_count' => 0 ,
                'q2_excel_download_count' => 0 ,
                'q3__pdf_download_count' => 0 ,
                'q3_excel_download_count' => 0 ,
                'q4__pdf_download_count' => 0 ,
                'q4_excel_download_count' => 0 
            ]
        );
        return redirect()->back();
    }

    public function show($id){
        $financeInfo = FinanceInfo::find($id);
        return view('back-end.finance-info.show', compact('financeInfo'));
    }

    public function destroy($id){
        FinanceInfo::find($id)->delete();
        return redirect()->back();
    }

    public function update(Request $request, $id){
        $financeInfo = FinanceInfo::find($id);
        
        $uploadUrl = $this->uploadExcel($request, 'annual_excel', $financeInfo->company);

        if($uploadUrl != "#"){
            $financeInfo->annual_excel_url = $uploadUrl;
        }

        $uploadUrl = $this->uploadPdf($request, 'annual_pdf_1', $financeInfo->company);

        if($uploadUrl != "#"){
            $financeInfo->annual_pdf_1_url = $uploadUrl;
        }

        $uploadUrl = $this->uploadPdf($request, 'annual_pdf_2', $financeInfo->company);
        
        if($uploadUrl != "#"){
            $financeInfo->annual_pdf_2_url = $uploadUrl;
        }

        $uploadUrl = $this->uploadPdf($request, 'annual_pdf_3', $financeInfo->company);
        
        if($uploadUrl != "#"){
            $financeInfo->annual_pdf_3_url = $uploadUrl;
        }

        $uploadUrl = $this->uploadPdf($request, 'annual_pdf_4', $financeInfo->company);
        
        if($uploadUrl != "#"){
            $financeInfo->annual_pdf_4_url = $uploadUrl;
        }

        $uploadUrl = $this->uploadPdf($request, 'annual_pdf_5', $financeInfo->company);
        
        if($uploadUrl != "#"){
            $financeInfo->annual_pdf_5_url = $uploadUrl;
        }

        $uploadUrl = $this->uploadExcel($request, 'q1_excel', $financeInfo->company);
        
        if($uploadUrl != "#"){
            $financeInfo->q1_excel_url = $uploadUrl;
        }

        $uploadUrl = $this->uploadExcel($request, 'q2_excel', $financeInfo->company);
        
        if($uploadUrl != "#"){
            $financeInfo->q2_excel_url = $uploadUrl;
        }

        $uploadUrl = $this->uploadExcel($request, 'q3_excel', $financeInfo->company);
        
        if($uploadUrl != "#"){
            $financeInfo->q3_excel_url = $uploadUrl;
        }

        $uploadUrl = $this->uploadExcel($request, 'q4_excel', $financeInfo->company);
        
        if($uploadUrl != "#"){
            $financeInfo->q4_excel_url = $uploadUrl;
        }

        $uploadUrl = $this->uploadPdf($request, 'q1_pdf', $financeInfo->company);
        
        if($uploadUrl != "#"){
            $financeInfo->q1__pdf_url = $uploadUrl;
        }

        $uploadUrl = $this->uploadPdf($request, 'q2_pdf', $financeInfo->company);
        
        if($uploadUrl != "#"){
            $financeInfo->q2__pdf_url = $uploadUrl;
        }

        $uploadUrl = $this->uploadPdf($request, 'q3_pdf', $financeInfo->company);
        
        if($uploadUrl != "#"){
            $financeInfo->q3__pdf_url = $uploadUrl;
        }

        $uploadUrl = $this->uploadPdf($request, 'q4_pdf', $financeInfo->company);
        
        if($uploadUrl != "#"){
            $financeInfo->q4__pdf_url = $uploadUrl;
        }
        
        $financeInfo->save();
        
        return redirect()->back();
    }

    private function uploadExcel(Request $request, $name, $company){
        $path = "#";
        if($request->file($name)){
            $request->validate([
                $name => 'mimes:xlsx,xls',
            ]);

            try{
                $epath = $request->file($name)->store(
                    env('APP_ENV') . '/financial-info/' . $company->id . '/excel', 's3'
                );
            }catch(\Exception $exception){
                $exception->getMessage();
                return back()->withError("There was an error with uploading your file")->withInput(); 
            }

            $path = $epath;
        }
        return $path;
    }

    private function uploadPdf(Request $request, $name, $company){
        $path = "#";
        if($request->file($name)){
            $request->validate([
                $name => 'mimes:pdf',
            ]);

            try{
                $epath = $request->file($name)->store(
                    env('APP_ENV') . '/financial-info/' . $company->id . '/pdf', 's3'
                );
            }catch(\Exception $exception){
                $exception->getMessage();
                return back()->withError("There was an error with uploading your file")->withInput(); 
            }

            $path = $epath;
        }
        return $path;
    }
}
