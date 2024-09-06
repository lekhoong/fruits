<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id(); // 自动生成自增主键
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // 关联用户表，并设置删除级联
            $table->decimal('total_price', 8, 2); // 总价格，8 位数字，2 位小数
            $table->string('delivery_method'); // 送货方式
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending'); // 状态
            $table->timestamps(); // 自动生成 created_at 和 updated_at 字段
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
