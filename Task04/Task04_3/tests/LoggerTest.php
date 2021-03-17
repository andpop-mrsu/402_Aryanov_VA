<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\StudentsList;
use App\Student;
use App\FileLogger;
use App\DBLogger;

class LoggerTest extends TestCase
{
    public function testLog()
    {
        $fileLogger = new FileLogger('logs');
        $dbLogger = new DbLogger('logs');
        $studentsListFile = new StudentsList($fileLogger);
        $studentsListDB = new StudentsList($dbLogger);
        $this -> assertTrue(file_exists("./logs/logs.db"));
        $this -> assertTrue(file_exists("./logs/logs.txt"));
        $sizeLogsTxt = sizeof(file("./logs/logs.txt"));
        $student1 = new Student();
        $student2 = new Student();
        $student3 = new Student();
        $studentsListFile -> add($student1);
        $studentsListDB -> add($student1);
        $studentsListFile -> add($student2);
        $studentsListDB -> add($student2);
        $studentsListFile -> add($student3);
        $studentsListDB -> add($student3);
        $this -> assertSame($sizeLogsTxt + 3, sizeof(file("./logs/logs.txt")));
    }
}
