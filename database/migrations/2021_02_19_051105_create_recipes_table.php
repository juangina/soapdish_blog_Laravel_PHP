<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->text('description');
            $table->text('special_instructions');

            $table->string('bb_cocoa');
            $table->string('bb_shea');
            $table->string('bb_mango');

            $table->string('bf_coconut');
            $table->string('bf_palm');
            $table->string('bf_lanolin');

            $table->string('bo_olive');
            $table->string('bo_advocado');
            $table->string('bo_caster');

            $table->string('eo_hemp_seed');
            $table->string('eo_tea_tree');
            $table->string('eo_honey');

            $table->string('fo_lavendar');
            $table->string('fo_lemongrass');
            $table->string('fo_eucalyptus');

            $table->string('cl_gold');
            $table->string('cl_cappuccino');
            $table->string('cl_lavendar');

            $table->string('ex_oatmeal');
            $table->string('ex_flaxseed');
            $table->string('ex_seaweed');

            $table->string('pr_grapeseed_extract');
            $table->string('pr_carrot_root_oil');
            $table->string('pr_tocopherols');

            $table->string('sodium_hydroxide');
            $table->string('potassium_hydroxide');
            $table->string('sodium_lactate');

            $table->string('distilled_water');
            $table->string('buttermilk');
            $table->string('coconut_milk');

            $table->string('temp_min');
            $table->string('temp_max');
            $table->string('discount');

            $table->string('image_id');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
