<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->unique();
            $table->text('description')->nullable();

            $table->float('price', 8, 2);
            $table->string('currency');

            $table->integer('duration')->default(30);
            $table->mediumText('metadata')->nullable();

            $table->timestamps();
        });

        Schema::create('plan_feature', function (Blueprint $table) {
            $table->increments('id');

	        $table->foreignId('fk_plan_id')->constrained('plan');

            $table->string('name');
            $table->string('code');
            $table->text('description')->nullable();

            $table->enum('type', ['feature', 'limit'])->default('feature');
            $table->integer('limit')->default(0);
            $table->mediumText('metadata')->nullable();

            $table->timestamps();
        });

        Schema::create('plan_subscription', function (Blueprint $table) {
            $table->increments('id');

	        $table->foreignId('fk_plan_id')->constrained('plan');

            $table->integer('model_id');
            $table->string('model_type');

            $table->string('payment_method')->nullable()->default(null);
            $table->boolean('is_paid')->default(false);

            $table->float('charging_price', 8, 2)->nullable();
            $table->string('charging_currency')->nullable();

            $table->boolean('is_recurring')->default(true);
            $table->integer('recurring_each_days')->default(30);

            $table->timestamp('starts_on')->nullable();
            $table->timestamp('expires_on')->nullable();
            $table->timestamp('cancelled_on')->nullable();

            $table->timestamps();
        });

        Schema::create('plan_subscription_usage', function (Blueprint $table) {
            $table->increments('id');

	        $table->foreignId('fk_subscription_id')->constrained('subscription');

            $table->string('code');
            $table->float('used', 9, 2)->default(0);

            $table->timestamps();
        });

        Schema::create('stripe_customer', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('model_id');
            $table->string('model_type');

            $table->string('customer_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plan');
        Schema::dropIfExists('plan_feature');
        Schema::dropIfExists('plan_subscription');
        Schema::dropIfExists('plan_subscription_usage');
        Schema::dropIfExists('stripe_customer');
    }
}
