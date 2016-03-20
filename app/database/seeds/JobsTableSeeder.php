<?php // app/database/seeds/JobsTableSeeder.php

class JobsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('applications')->delete();

        Application::create(array(
            'user_id' => 1,
            'jobid' => '987667',
            'company'=>'Hewlett Packard',
            'role'=>'System Software Intern',
            'joblink'=>'http://www.google.com',
            'applied_on'=>'2016-02-12'
        ));
        Application::create(array(
            'user_id' => 1,
            'jobid' => '7655655',
            'company'=>'Sony',
            'role'=>'Software Intern',
            'joblink'=>'http://www.sony.com',
            'applied_on'=>'2016-02-22'
        ));
        Application::create(array(
            'user_id' => 1,
            'jobid' => '7557666',
            'company'=>'LG',
            'role'=>'Python Software Intern',
            'joblink'=>'http://www.lg.com',
            'applied_on'=>'2016-03-12'
        ));
        Application::create(array(
            'user_id' => 1,
            'jobid' => '6655656',
            'company'=>'Walmart',
            'role'=>'Software Intern/Co-op',
            'joblink'=>'http://www.walmart.com',
            'applied_on'=>'2016-01-12'
        ));
        Application::create(array(
            'user_id' => 1,
            'jobid' => '887F768',
            'company'=>'HoneyWell',
            'role'=>'C Software Intern',
            'joblink'=>'http://www.hw.com',
            'applied_on'=>'2016-01-13'
        ));
        Application::create(array(
            'user_id' => 1,
            'jobid' => '0877JKL',
            'company'=>'Microsoft',
            'role'=>'Software Intern Program',
            'joblink'=>'http://www.ms.com',
            'applied_on'=>'2016-01-14'
        ));
        Application::create(array(
            'user_id' => 1,
            'jobid' => '88876FS',
            'company'=>'Wayfair',
            'role'=>'Intern',
            'joblink'=>'http://www.wayfair.com',
            'applied_on'=>'2016-01-25'
        ));
        Application::create(array(
            'user_id' => 1,
            'jobid' => '09888JH',
            'company'=>'Paypal',
            'role'=>'Co-op/Intern',
            'joblink'=>'http://www.paypal.com',
            'applied_on'=>'2016-01-17'
        ));
        Application::create(array(
            'user_id' => 1,
            'jobid' => '868768F',
            'company'=>'Juniper Networks',
            'role'=>'Network Intern',
            'joblink'=>'http://www.juniper.com',
            'applied_on'=>'2016-01-25'
        ));
    }

}