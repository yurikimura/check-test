<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.admin');
    }
    public function modal()
    {
        return view('admin.modal');
    }

    public function find()
    {
        return view('find', ['input' => '']);
    }
    public function search(Request $request)
    {
        $name = $request->input;
        $gender = null;
        switch ($request->gender) {
            case "male":
                $gender = "男性";
                break;
            case "female":
                $gender = "女性";
                break;
            case "other":
                $gender = "その他";
                break;
        };

        $category_id = null;
        switch ($request->category_id) {
            case "general":
                $category_id = "一般的なお問い合わせ";
                break;
            case "support":
                $category_id = "サポートに関するお問い合わせ";
                break;
            case "exchange":
                $category_id = "商品の交換について";
                break;
        };

        $query = Contact::query()
            ->where(function ($query) use ($name) {
                $query->where('first_name', 'LIKE', "%{$name}%")
                    ->orWhere('last_name', 'LIKE', "%{$name}%")
                    ->orWhere('email', 'LIKE', "%{$name}%");
            })
            ->when($gender, function ($query, $gender) {
                $query->where("gender", $gender);
            })
            ->when($category_id, function ($query, $category_id) {
                $query->where("category_id", $category_id);
            });

        // 日付検索の追加
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(10);
        $param = [
            'input' => $request->input,
            'contacts' => $contacts,
            'date' => $request->date, // フォームの値を保持
        ];
        return view('admin', $param);
    }
}
