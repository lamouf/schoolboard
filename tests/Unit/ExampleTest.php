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

    public function testGradesStudent()
    {
        $s = Student::find(3);

        $this->assertTrue(($s->id == 3));
    }

    public function  testSaveGradeForStudent()
    {
        $student = Student::first();
        $scoolboard = Schoolboard::first();

    }
}
