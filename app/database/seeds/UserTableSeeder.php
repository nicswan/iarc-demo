<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        //DB::table('user')->delete();

        User::create(array(
                'email' => 'nicole.swan@gmail.com',
	            'password' => Hash::make('password'),
    	        'first_name' => 'Nicole',
        	    'last_name' => 'Swan'
        	)
		);
		
		User::create(array(
                'email' => 'jane@janedoe.com',
                'password' => Hash::make('password'),
                'first_name' => 'Jane',
                'last_name' => 'Doe'
        	)
		);
    }

}
