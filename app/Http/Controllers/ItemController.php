<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item_category;
use App\Models\Category;


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
        $item_categories = Item_category::orderBy('created_at', 'asc')->with('category')->paginate(10);
        $categories = Category::all();

        return view('item.index', compact('item_categories', 'categories'));
    }
    /**
     * 商品名前検索
     */
    public function search1(Request $request)
    {

            /* テーブルから全てのレコードを取得する */
            $item_category = Item_category::query();
            $categories = Category::all();


            /* キーワードから検索処理 */
            $keyword = $request->input('keyword');
            if(!empty($keyword)) {//$keywordが空ではない場合、検索処理を実行します
                $item_category->where('name', 'LIKE', "%{$keyword}%")
                ->get();
            }


            /* ページネーション */
            $item_categories = $item_category->paginate(10);

            return view('item.index', compact('item_categories', 'categories'));

    }

    /**
     * 商品種別検索
     */
    public function search2(Request $request)
    {

            /* テーブルから全てのレコードを取得する */
            $item_category = Item_category::query();
            $categories = Category::all();


            /* キーワードから検索処理 */
            $keyword = $request->input('keyword');
            if(!empty($keyword)) {//$keywordが空ではない場合、検索処理を実行します
                $item_category->where('category_id', 'LIKE', "{$keyword}")
                ->get();
            }


            /* ページネーション */
            $item_categories = $item_category->paginate(10);

            return view('item.index', compact('item_categories', 'categories'));

    }

        /**
     * 商品種別検索
     */
    public function search3(Request $request)
    {

            /* テーブルから全てのレコードを取得する */
            $item_category = Item_category::query();
            $categories = Category::all();


            /* キーワードから検索処理 */
            $keyword = $request->input('keyword');
            if(!empty($keyword)) {//$keywordが空ではない場合、検索処理を実行します
                $item_category->where('price', 'LIKE', "{$keyword}")
                ->get();
            }


            /* ページネーション */
            $item_categories = $item_category->paginate(10);

            return view('item.index', compact('item_categories', 'categories'));

    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        $categories = Category::all();

        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item_category::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'category_id' => $request->category_id,
                'detail' => $request->detail,
                'price' => $request->price,
            ]);

            return redirect('/items');
        }

        return view('item.add', compact('categories'));
    }

    public function edit(Request $request)
    {
        $item_category = Item_category::where('id', '=', $request->id)->first();
        $categories = Category::all();

        return view('item.edit')->with([
            'item_category' => $item_category,
            'categories' => $categories
]);
    }

    public function update(Request $request)
    {
        //既存のレコードを取得、編集してから保存
        $item = Item_category::where('id', '=', $request->id)->first();
        $item->user_id = $request->user()->id;
        $item->name = $request->name;
        $item->category_id = $request->category_id;
        $item->detail = $request->detail;
        $item->price = $request->price;
        $item->save();

        return redirect('items');
    }

    public function destroy(Request $request)
    {
        //既存のレコードを取得、削除
        $item = Item_category::where('id', '=', $request->id)->first();
        $item->delete(); 

        return redirect('items');
    }

}
