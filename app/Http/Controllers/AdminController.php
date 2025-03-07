<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchases;
use App\Models\Product;

class AdminController extends Controller
{
    // 添加一个 index 方法
    public function index(Request $request)
    {
        return $this->dashboard($request);
    }

    public function dashboard(Request $request)
    {
        $status = $request->query('status', 'all');
        $search = $request->query('search', '');

        $query = Purchases::with('user', 'Items.product');

        if (!empty($search)) {
            $query->where('id', 'like', '%' . $search . '%')
                  ->orWhereHas('user', function ($q2) use ($search) {
                      $q2->where('name', 'like', '%' . $search . '%');
                  });
        }

        if ($status == 'pending') {
            $query->where('status', 'pending');
        } elseif ($status == 'completed') {
            $query->where('status', 'completed');
        }

        $purchases = $query->orderBy('created_at', 'desc')->paginate(10);
        $pendingCount = Purchases::where('status', 'pending')->count();
        $completedCount = Purchases::where('status', 'completed')->count();

        return view('admin.dashboard', compact('purchases', 'pendingCount', 'completedCount', 'search'));
    }

    public function updateStatus(Request $request, $id)
    {
        $purchase = Purchases::find($id);
        $purchase->status = 'completed';
        $purchase->save();

        return redirect()->route('admin.dashboard')
            ->with('status', "Order #{$id} status updated to completed!");
    }

    public function create()
    {
    
        return view('admin.products.create');
    }


    public function store(Request $request)
    {
        // 验证数据
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric',
            'product_id' => 'required|string',
            'image'       => 'required|image|max:2048', // 验证上传文件，最大2MB
        ]);

        // 如果上传了图片，处理文件上传
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images');
            
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            // 将文件移动到 public\images 目录下
            $file->move($destinationPath, $filename);
            
            // 存入数据库的字段名为 'image'
            $data['image'] = 'images/' . $filename;
        }
        
        

        // 创建新产品记录
        Product::create($data);

        // 重定向并显示成功消息
        return redirect()->route('admin.products.create')->with('status', 'Product added successfully!');
    }

}
