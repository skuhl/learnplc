<?php 

class TableSeeder extends Seeder {

    public function run()
    {

    	// Course::create(array('id' => '1', 'name' => 'course 1'));
    	// Course::create(array('id' => '2', 'name' => 'course 2'));
    	// Course::create(array('id' => '3', 'name' => 'course 3'));

  //   	Module::create(array('id' => 1, 'name' => 'module 1'));
  //   	Module::create(array('id' => 2, 'name' => 'module 2'));
  //   	Module::create(array('id' => 3, 'name' => 'module 3'));
  //   	Module::create(array('id' => 4, 'name' => 'module 4'));

  //   	Section::create(array('id' => 1, 'name' => 'm1s1', 'module_id' => 1));
  //   	Section::create(array('id' => 2, 'name' => 'm1s2', 'module_id' => 1));
  //   	Section::create(array('id' => 3, 'name' => 'm2s1', 'module_id' => 2));
  //   	Section::create(array('id' => 4, 'name' => 'm2s2', 'module_id' => 2));
  //   	Section::create(array('id' => 5, 'name' => 'm3s1', 'module_id' => 3));
  //   	Section::create(array('id' => 6, 'name' => 'm3s2', 'module_id' => 3));
  //   	Section::create(array('id' => 7, 'name' => 'm4s1', 'module_id' => 4));
  //   	Section::create(array('id' => 8, 'name' => 'm4s2', 'module_id' => 4));

  //   	$course_module = array(
  //   		array('course_id' => '1', 'module_id' => 1),
  //   		array('course_id' => '1', 'module_id' => 2),
  //   		array('course_id' => '1', 'module_id' => 3),
  //   		array('course_id' => '1', 'module_id' => 4),
  //   		array('course_id' => '2', 'module_id' => 1),
  //   		array('course_id' => '2', 'module_id' => 2),
  //   		array('course_id' => '2', 'module_id' => 3),
  //   		array('course_id' => '2', 'module_id' => 4),
  //   		array('course_id' => '3', 'module_id' => 1),
  //   		array('course_id' => '3', 'module_id' => 2),
  //   		array('course_id' => '3', 'module_id' => 3),
  //   		array('course_id' => '3', 'module_id' => 4)
  //   	);
		// DB::table('course_module')->insert($course_module);

		// $course_roles = array(
		// 	array('id' => 1, 'name' => 'student'),
		// 	array('id' => 2, 'name' => 'instructor')
		// );
		// DB::table('course_roles')->insert($course_roles);


		// User::create(array('id' => 100, 'email' => 'instructor1@plc.com', 'password' => Hash::make('password')));
		// DB::table('course_user')->insert(array('course_id' => '1', 'user_id' => 100, 'course_role' => 2));
    	for($i = 101; $i < 200; $i++) {
    		// User::create(array('id' => $i, 'email' => 'student'.$i.'@plc.com'));
    		//DB::table('course_user')->insert(array('course_id' => '1', 'user_id' => $i, 'course_role' => 1));
    		 for($j = 1; $j <= 8; $j++){
    		 	SectionProgress::create(array('completed' => rand(0,1), 'course_id' => 1, 'user_id' => $i, 'section_id' => $j));
    		 }
    	}

  //   	User::create(array('id' => 200, 'email' => 'instructor2@plc.com', 'password' => Hash::make('password')));
		// DB::table('course_user')->insert(array('course_id' => '2', 'user_id' => 200, 'course_role' => 2));
    	for($i = 201; $i < 300; $i++) {
    		// User::create(array('id' => $i, 'email' => 'student'.$i.'@plc.com'));
    	//	DB::table('course_user')->insert(array('course_id' => '2', 'user_id' => $i, 'course_role' => 1));
    		 for($j = 1; $j <= 8; $j++){
    		 	SectionProgress::create(array('completed' => rand(0,1), 'course_id' => 2, 'user_id' => $i, 'section_id' => $j));
    		 }
    	}

  //   	User::create(array('id' => 300, 'email' => 'instructor3@plc.com', 'password' => Hash::make('password')));
		// DB::table('course_user')->insert(array('course_id' => '3', 'user_id' => 300, 'course_role' => 2));
    	for($i = 301; $i < 400; $i++) {
    		// User::create(array('id' => $i, 'email' => 'student'.$i.'@plc.com'));
    //		DB::table('course_user')->insert(array('course_id' => '3', 'user_id' => $i, 'course_role' => 1));
    		for($j = 1; $j <= 8; $j++){
    			SectionProgress::create(array('completed' => rand(0,1), 'course_id' => 3, 'user_id' => $i, 'section_id' => $j));
    		}
    	}
        
    }

}