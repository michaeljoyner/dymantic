<?php
use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory as TestDummy;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 4/14/2015
 * Time: 1:09 PM
 */
class TasksTest extends TestCase {

    use DatabaseTransactions;

    /**
     * @test
     */
    public function itCanCreateTasks()
    {
        $project = TestDummy::create('Dymantic\Projects\Project');
        $taskData = [
            'name'     => 'Website Development',
            'brief'    => 'A very detailed brief',
            'notes'    => 'Meet up to discuss design',
            'deadline' => 'June 2106',
            'status'   => 'Pending'
        ];
        $this->loginAsAValidUser();
        $this->visit('admin/projects/' . $project->id)
             ->andClick('Task')
             ->andSeePageIs('admin/projects/' . $project->id . '/task/create')
             ->andSubmitForm('Create', $taskData)
             ->andVerifyInDatabase('tasks', $taskData);

    }

    /**
     * @test
     */
    public function itShowsAllTasksForAProject()
    {
        $project = TestDummy::create('Dymantic\Projects\Project');
        $task1 = TestDummy::create('Dymantic\Projects\Task', ['project_id' => $project->id]);
        $task2 = TestDummy::create('Dymantic\Projects\Task', ['project_id' => $project->id]);
        $task3 = TestDummy::create('Dymantic\Projects\Task', ['project_id' => $project->id]);

        $this->loginAsAValidUser();
        $this->visit('admin/projects/' . $project->id)
             ->andSee($task1->name)
             ->andSee($task2->name)
             ->andSee($task3->name);

    }

    /**
     * @test
     */
    public function itShowsATasksInfo()
    {
        $project = TestDummy::create('Dymantic\Projects\Project');
        $task1 = TestDummy::create('Dymantic\Projects\Task', ['project_id' => $project->id]);

        $this->loginAsAValidUser();
        $this->visit('admin/projects/' . $project->id)
             ->andClick($task1->name)
             ->andSee($task1->name)
             ->andSee($task1->deadline)
             ->andSee($task1->status);
    }

}