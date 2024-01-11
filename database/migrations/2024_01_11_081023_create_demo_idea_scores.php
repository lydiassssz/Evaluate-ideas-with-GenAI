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
        Schema::create('demo_idea_scores', function (Blueprint $table) {
            $table->id();
            $table->text('problem')->comment('problem')->nullable();
            $table->text('solution')->comment('solution')->nullable();
            $table->integer('evidence')->comment('evidence_score')->default(0);
            $table->text('evidence_justification')->comment('evidence_justification')->nullable();
            $table->text('evidence_detail')->comment('evidence_detail')->nullable();
            $table->integer('impact')->comment('impact_score')->default(0);
            $table->text('impact_justification')->comment('impact_justification')->nullable();
            $table->text('impact_detail')->comment('impact_detail')->nullable();
            $table->integer('possible')->comment('possible_score')->default(0);
            $table->text('possible_justification')->comment('possible_justification')->nullable();
            $table->text('possible_detail')->comment('possible_detail')->nullable();
            $table->boolean('length')->comment('length')->default(0);
            $table->text('note')->comment('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demo_idea_scores');
    }
};
