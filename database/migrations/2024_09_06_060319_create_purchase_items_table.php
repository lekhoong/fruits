<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 运行迁移。
     */
    public function up(): void
    {
        Schema::create('purchase_items', function (Blueprint $table) {
            $table->id(); // 自动生成自增主键
            $table->foreignId('purchase_id')->constrained()->onDelete('cascade'); // 关联到 purchases 表，并设置删除级联
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // 关联到 products 表，并设置删除级联
            $table->integer('quantity'); // 商品数量
            $table->decimal('price', 8, 2); // 商品价格
            $table->timestamps(); // 自动生成 created_at 和 updated_at 字段
        });
    }

    /**
     * 撤销迁移。
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};
