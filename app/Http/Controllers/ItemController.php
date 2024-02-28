<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;
use App\Models\Category;
use App\Models\Company;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item::orderBy('created_at', 'asc')->with('category', 'company')->paginate(10);
        $categories = Category::all();
        $companies = Company::all();


        return view('item.index', compact('items', 'categories', 'companies'));
    }
    /**
     * 商品名前検索
     */
    public function search1(Request $request)
    {

            /* テーブルから全てのレコードを取得する */
            $item = Item::query();
            $categories = Category::all();
            $companies = Company::all();


            /* キーワードから検索処理 */
            $keyword = $request->input('keyword');
            if(!empty($keyword)) {//$keywordが空ではない場合、検索処理を実行します
                $item->where('name', 'LIKE', "%{$keyword}%")
                ->get();
            }


            /* ページネーション */
            $items = $item->paginate(10);

            return view('item.index', compact('items', 'categories', 'companies'));

    }

    /**
     * 商品種別検索
     */
    public function search2(Request $request)
    {

            /* テーブルから全てのレコードを取得する */
            $item = Item::query();
            $categories = Category::all();
            $companies = Company::all();


            /* キーワードから検索処理 */
            $keyword = $request->input('keyword');
            if(!empty($keyword)) {//$keywordが空ではない場合、検索処理を実行します
                $item->where('category_id', 'LIKE', "{$keyword}")
                ->get();
            }


            /* ページネーション */
            $items = $item->paginate(10);

            return view('item.index', compact('items', 'categories', 'companies'));

    }
    /**
     * 商品種別検索
     */
    public function search3(Request $request)
    {

            /* テーブルから全てのレコードを取得する */
            $item = Item::query();
            $categories = Category::all();
            $companies = Company::all();


            /* キーワードから検索処理 */
            $keyword = $request->input('keyword');
            if(!empty($keyword)) {//$keywordが空ではない場合、検索処理を実行します
                $item->where('company_id', 'LIKE', "{$keyword}")
                ->get();
            }


            /* ページネーション */
            $items = $item->paginate(10);

            return view('item.index', compact('items', 'categories', 'companies'));

    }


        /**
     * 商品価格検索
     */
    public function search4(Request $request)
    {

            /* テーブルから全てのレコードを取得する */
            $item = Item::query();
            $categories = Category::all();
            $companies = Company::all();


            /* キーワードから検索処理 */
            $keyword = $request->input('keyword');
            if(!empty($keyword)) {//$keywordが空ではない場合、検索処理を実行します
                $item->where('price', 'LIKE', "{$keyword}")
                ->get();
            }


            /* ページネーション */
            $items = $item->paginate(10);

            return view('item.index', compact('items', 'categories', 'companies'));

    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        $categories = Category::all();
        $companies = Company::all();

        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
                'category_id' => "required",
                'company_id' => "required",
                'jan_code' => "required",
                'detail' =>  "required",
                'price' =>  "required",
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'category_id' => $request->category_id,
                'company_id' => $request->company_id,
                'jan_code' => $request->jan_code,
                'detail' => $request->detail,
                'price' => $request->price,
            ]);

            return redirect('/items');
        }

        return view('item.add', compact('categories', 'companies'));
    }

    public function edit(Request $request)
    {
        $item = Item::where('id', '=', $request->id)->first();
        $categories = Category::all();
        $companies = Company::all();


        return view('item.edit')->with([
            'item' => $item,
            'categories' => $categories,
            'companies' => $companies
]);
    }

    public function update(Request $request)
    {

        
        $this->validate($request, [
            'name' => 'required|max:100',
            'category_id' => "required",
            'company_id' => "required",
            'jan_code' => "required",
            'detail' =>  "required",
            'price' =>  "required",
        ]);
        
        //既存のレコードを取得、編集してから保存
        $item = Item::where('id', '=', $request->id)->first();
        $item->user_id = Auth::id();
        $item->category_id = $request->category_id;
        $item->company_id = $request->company_id;
        $item->jan_code = $request->jan_code;
        $item->name = $request->name;
        $item->detail = $request->detail;
        $item->price = $request->price;
        $item->save();

        return redirect('items');
    }

    public function destroy(Request $request)
    {
        //既存のレコードを取得、削除
        $item = Item::where('id', '=', $request->id)->first();
        $item->delete(); 

        return redirect('items');
    }

}
