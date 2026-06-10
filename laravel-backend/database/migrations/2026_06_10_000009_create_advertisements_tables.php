<?php

use IlluminateDatabaseMigrationsMigration;
use IlluminateDatabaseSchemaBlueprint;
use IlluminateSupportFacadesSchema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->string('title');
            $table->string('image');
            $table->string('target_url');
            $table->string('position'); // e.g. homepage, category, city
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['active', 'expired', 'pending'])->default('pending');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->index('status');
        });

        Schema::create('advertisement_clicks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('advertisement_id');
            $table->uuid('user_id')->nullable();
            $table->timestamp('clicked_at')->useCurrent();

            $table->foreign('advertisement_id')->references('id')->on('advertisements')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('advertisement_clicks');
        Schema::dropIfExists('advertisements');
    }
};
