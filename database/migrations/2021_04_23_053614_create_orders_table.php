<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // mấy ni đưa hết qua table chi tiết hóa đơn
            // user_id
            // địa chỉ ng nhận 
            // tổng tiền đơn hàng
            // đợi t gửi ni cho coi
            // ảo lun
            // lưu giỏ hàng lun à
            // lưu session đc rồi
            // là cái order là ta vs anh tâm làm giỏ hàng á 
            // ời rứa  đổi tên lại cho dễ nhìn hóa
            // giỏ hàng thì lưu cũng lưu giống bill rứa 
            // mà giỏ hàng t nghĩ lưu localStorage khỏe hơn đỡ tạo table nhìu phức tạp
            // do ntooáố nói đi
            // lưu session thì đâu có lưu trong db
            // lưu tạm đó thôi hết phiên làm việc như tắt trihf duyệt thì hén mất vào lại phẢI ADD CART LẠI 
            // h m chỉ tạo table bills với invoice_bills thôi
            // làm session chớ
            // làm session hoặc là lưu db, dùng 1 trong hai
            // nỉ để tối về nói cho rõ
            $table->string('products');
            $table->integer('price');
            $table->string('quantity');
            $table->string('Discount_Codes');
            $table->timestamps();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
