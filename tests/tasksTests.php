<?php

include(__DIR__.'/../src/classes/authentification.php');
include(__DIR__.'/../src/classes/tasks.php');

class tasksTests extends PHPUnit_Framework_TestCase {
	public function testAddTask()
    {
		$auth=new Authentification();
		$tasks=new Tasks();
		$auth->add_user('toto','toto');
		$tasks->add_task('toto', 'test_title', 'test_task');
		$tasks_t=$tasks->get_tasks();
		$this->assertArrayHasKey('test_title', $tasks_t[0]); 
		$this->assertEquals($tasks_t[0]['test_title'], 'test_task');
		$tasks->remove_task('toto', 0, 'test_title');
		$auth->remove_user('toto');
    }

    public function testRemoveTask() 
    {
		$auth=new Authentification();
		$tasks=new Tasks();
		$auth->add_user('toto','toto');
		$tasks->add_task('toto', 'test_title', 'test_task');
		$tasks->remove_task('toto', 0, 'test_title');
		$tasks_t=get_tasks('toto');
		$this->assertArrayNotHasKey('test_title', $tasks_t[0]);
		$auth->remove_user('toto');
    }
}
?>