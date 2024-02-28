<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Company;


class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    //
    $companies = Company::paginate(10);

    return view('companies.index',[
        'companies' => $companies,
    ]);
    }


public function create(Request $request)
{
    return view('companies.create');
}

public function store(Request $request)
{
    $this->validate($request, [
        "name" => "required",
        "post_code" => "required",
        "address" => "required",
        "tel_num" => "required",
        "term" => "required",
        "detail" => "required",
        "url" => "required",
    ]);
    //新しいレコードの作成
    $company = new Company();
    $company->user_id = Auth::user()->id;
    $company->name = $request->name;
    $company->post_code = $request->post_code;
    $company->address = $request->address;
    $company->tel_num = $request->tel_num;
    $company->term = $request->term;
    $company->detail = $request->detail;
    $company->url = $request->url;
    $company->save();

    return redirect('companies');
}

public function edit(Request $request)
{
    $company = Company::where('id', '=', $request->id)->first();


    return view('companies.edit')->with([
        'company' => $company
]);
}

public function update(Request $request)
{
    $this->validate($request, [
        "name" => "required",
        "post_code" => "required",
        "address" => "required",
        "tel_num" => "required",
        "term" => "required",
        "detail" => "required",
        "url" => "required",
    ]);

    //既存のレコードを取得、編集してから保存
    //dd(Auth::id());
    $company = Company::where('id', '=', $request->id)->first();
    $company->user_id = Auth::id();
    $company->name = $request->name;
    $company->post_code = $request->post_code;
    $company->address = $request->address;
    $company->tel_num = $request->tel_num;
    $company->term = $request->term;
    $company->detail = $request->detail;
    $company->url = $request->url;
    $company->save();

    return redirect('companies');
}

public function destroy(Request $request)
{
    //既存のレコードを取得、削除
    $company = Company::where('id', '=', $request->id)->first();
    $company->delete(); 

    return redirect('companies');
}


}
