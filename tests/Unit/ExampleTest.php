<?php

namespace Tests\Unit;

use App\Schoolboard;
use App\Student;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testExistingObject()
    {
        $s = Student::first();
        $this->assertNotNull($s);
    }

    public function testMatchingStudentId()
    {
        $s = Student::find(3);

        $this->assertTrue(($s->id == 3));
    }

    public function  testChanginSchooBoartForExistingStudent()
    {
        $student = Student::first();
        $initialSchoolBoard = $student->schoolboard()->first();
        $oldId = $initialSchoolBoard->id;
        $newId =  ( $oldId == 1) ? 2 : 1;
        $student->schoolboard_id = $newId;
        $student->save();
        $obj = Student::first();

        $this->assertTrue(($oldId != $obj->schoolboard_id));

    }
}
