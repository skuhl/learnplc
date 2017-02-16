<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Database extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('password');
			$table->boolean('is_instructor')->default(0);
			$table->boolean('confirmed')->default(0);
			$table->string('remember_token')->nullable();
			$table->timestamp('last_login_at');
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('courses', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->char('token', 32)->index();
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::create('modules', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
		});

		Schema::create('sections', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('module_id')->unsigned()->index();
			$table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
		});



		Schema::create('course_roles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
		});

		Schema::create('section_progress', function(Blueprint $table) {
			$table->increments('id');
			$table->boolean('completed')->default(0);
			$table->integer('course_id')->unsigned()->index();
			$table->integer('user_id')->unsigned()->index();
			$table->integer('section_id')->unsigned()->index();
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
		});

		Schema::create('email_confirmation', function(Blueprint $table) {
			$table->string('email')->index();
			$table->string('token')->index();
			$table->timestamp('created_at');
		});

		Schema::create('password_reminders', function(Blueprint $table) {
			$table->string('email')->index();
			$table->string('token')->index();
			$table->timestamp('created_at');
		});



		Schema::create('course_user', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('course_role')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_role')->references('id')->on('course_roles');
        });

        Schema::create('course_module', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned()->index();
            $table->integer('module_id')->unsigned()->index();
            $table->boolean('enabled')->default(1);
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users');
		Schema::drop('courses');
		Schema::drop('modules');
		Schema::drop('sections');
		Schema::drop('course_roles');
		Schema::drop('section_progress');
		Schema::drop('email_confirmation');
		Schema::drop('password_reminders');
		Schema::drop('course_user');
		Schema::drop('course_module');
	}

}
