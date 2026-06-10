<?php

use IlluminateDatabaseMigrationsMigration;
use IlluminateDatabaseSchemaBlueprint;
use IlluminateSupportFacadesSchema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('roommate_profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('gender')->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->string('occupation')->nullable();
            $table->decimal('budget', 12, 2)->nullable();
            $table->boolean('smoking')->default(false);
            $table->boolean('drinking')->default(false);
            $table->boolean('pets')->default(false);
            $table->text('bio')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('roommate_matches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('matched_user_id');
            $table->unsignedInteger('score')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('matched_user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('tiffin_listings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('listing_id');
            $table->enum('meal_type', ['breakfast', 'lunch', 'dinner', 'combo'])->default('combo');
            $table->enum('veg_nonveg', ['veg', 'non_veg', 'egg'])->default('veg');
            $table->decimal('monthly_price', 12, 2);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
        });

        Schema::create('laundry_services', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('listing_id');
            $table->boolean('pickup_available')->default(false);
            $table->boolean('delivery_available')->default(false);
            $table->boolean('ironing_available')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('laundry_services');
        Schema::dropIfExists('tiffin_listings');
        Schema::dropIfExists('roommate_matches');
        Schema::dropIfExists('roommate_profiles');
    }
};
