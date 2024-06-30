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
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('status',[
                'تم إستلام طلبك',
                'طلبك قيد الاعداد',
                'طلبك قيد التوصيل ',
                'تم توصيل طلبك اليك'])->default('تم إستلام طلبك');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            
        });
    }
};
