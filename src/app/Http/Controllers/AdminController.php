<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $contacts = Contact::paginate(7);
        $categories = Category::all();

        return view('admin', [
            'contacts' => $contacts,
            'categories' => $categories
        ]);
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
            case 1:
                $gender = "男性";
                break;
            case 2:
                $gender = "女性";
                break;
            case 3:
                $gender = "その他";
                break;
        };

        $category_id = $request->category_id;

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

        $contacts = $query->paginate(7);
        $categories = Category::all();
        $param = [
            'input' => $request->input,
            'contacts' => $contacts,
            'date' => $request->date, // フォームの値を保持
            'categories' => $categories
        ];
        return view('admin', $param);
    }
}
