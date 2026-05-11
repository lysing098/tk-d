<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        // HERO SECTION
        Schema::create('tbl_hero_section', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sub_title');
            $table->string('background_image');
            $table->string('btn_primary_text');
            $table->string('btn_primary_link');
            $table->string('btn_secondary_text');
            $table->string('btn_secondary_link');
            $table->string('page');
            $table->timestamps();
        });

        // PRODUCTS
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('size');
            $table->string('color');
            $table->json('images');
            $table->timestamps();
        });

        // BLOG
        Schema::create('tbl_blog', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->integer('order');
            $table->timestamps();
        });

        // CERTIFICATE
        Schema::create('tbl_certificate', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->integer('order');
            $table->timestamps();
        });

        // FAQ
        Schema::create('tbl_faq', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('answer');
            $table->integer('order');
            $table->timestamps();
        });

        // ACTIVITIES
        Schema::create('tbl_activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->string('image');
            $table->timestamps();
        });

        // COMPANY
        Schema::create('tbl_company', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('email');
            $table->string('tel');
            $table->string('location');
            $table->timestamps();
        });

        // EXPORT
        Schema::create('tbl_export', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->timestamps();
        });

        // CONTACT
        Schema::create('tbl_contact', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('company');
            $table->string('country');
            $table->string('email');
            $table->string('whatsapp');
            $table->foreignId('product_id');
            $table->integer('qty');
            $table->text('message');
            $table->timestamps();
        });

        // TEAM
        Schema::create('tbl_team', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_team');
        Schema::dropIfExists('tbl_contact');
        Schema::dropIfExists('tbl_export');
        Schema::dropIfExists('tbl_company');
        Schema::dropIfExists('tbl_activities');
        Schema::dropIfExists('tbl_faq');
        Schema::dropIfExists('tbl_certificate');
        Schema::dropIfExists('tbl_blog');
        Schema::dropIfExists('tbl_product');
        Schema::dropIfExists('tbl_hero_section');
    }
};
