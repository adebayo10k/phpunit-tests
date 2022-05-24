<?php
declare(strict_types = 1);
namespace YSystems\Tests\Unit;
require('includes/domain/question.php');
use YSystems\Domain\Question;
use PHPUnit\Framework\TestCase;
use TypeError;

/*
The Question class is the only one that doesn't currently involve database queries in it's object construction. It's therefore the only one to which we can apply unit testing for now.

DO NOT reference object properties BEFORE the completion of object construction.

At present, object methods of the ys.com application are called only DURING object construction.

So, no mutator methods are called to change the properties of already instantiated object.
In other words, we can't make a series of changes to an object and test its' state after each change.
For now, this limits the scope of object testing. 
*/

class QuestionTest extends TestCase {

    // given that we have a Question object...

    // when  we call ... method

    // we assert that ....

    public function testEmptyArray() {

        $stack = [];
        $this->assertEmpty($stack);
    }

    /**
     * function to test Question instantiation with correct data types and
     * then test a property
     */
    public function testQuestionInstantiation() {

        $q = new Question("hello", "bawoni", ["a", "b", "c", "d", "e"]);

        print_r($q);

        $this->assertSame(
            $q->answerPhrase,
            "bawoni",
            "they were not the same"
        );
    }

//    // function to test Question instantiation with incorrect data types
//    public function testQuestionInstantiationWithIncorrectArgTypes() {
//
//        // 3rd argument not an array
//        // a. fail
//        // b. handle and expectException()
//        unset($q);
//        $this->expectException(\TypeError::class);
//        $q = new Question("hello", "bawoni", "a");
//
//    }
//
//   // function to test Question instantiation with incorrect number of arguments
//   public function testQuestionInstantiationWithIncorrectNumberOfArgs() {
//
//        // assert that exception thrown
//        unset($q);
//        $this->expectException(\ArgumentCountError::class);
//        $q = new Question();
//
//    }
//
    // function to test equal number of ordered and shuffled array elements
    public function testOrderedAndShuffledResponseArraysContainEqualNumberOfElements() {

        unset($q);
        $q = new Question("hello", "bawoni", ["a", "b", "c", "d", "e"]);
        $this->assertEquals(count($q->orderedPossibleResponses), count($q->shuffledPossibleResponses));

    }    


    // assert orderedPossibleResponses is an array
    public function testOrderedPossibleResponsesIsOfTypeArray() {

        unset($q);
        $q = new Question("hello", "bawoni", ["a", "b", "c", "d", "e"]);
        $this->assertIsArray($q->orderedPossibleResponses);

    }

    // assert orderedPossibleResponses is an array
    public function testNumberOfShuffledArrayElements() {

        unset($q);
        $q = new Question("hello", "bawoni", ["a", "b", "c", "d", "e"]);
        $this->assertCount (5, $q->shuffledPossibleResponses);

    }


}
