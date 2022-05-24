<?php
namespace YSystems\Domain;

use Error;
use Exception;

class Question {
    private $questionPhrase;
    private $answerPhrase;
    private $orderedPossibleResponses = [];

    private $shuffledPossibleResponses = [];


    public function __construct (string $questionPhrase, string $answerPhrase, array $orderedPossibleResponses) {

        try {
            
            $this->questionPhrase = $questionPhrase;
            $this->answerPhrase = $answerPhrase;

            if ( is_array($orderedPossibleResponses) && is_countable($orderedPossibleResponses) ){            
                $this->orderedPossibleResponses = $orderedPossibleResponses;
            }
            else {
                throw new Exception("Tried to create a Question object using incorrect number of answerPhrase strings for this quiz application (<1 || >5");
            }

            $this->shuffledPossibleResponses = $this->shuffleResponses();
        }
        catch (\Exception $e) {
            # call error logging and logout functions        
        }
               

    } // end constructor


    /**
     * string representation of this object
     * @return string
    */
    public function __toString(): string {
        $output = "<p>questionPhrase : " . $this->questionPhrase . "<br>";
        $output .= "answerPhrase : " . $this->answerPhrase . "<br>";
        $output .= "shuff 0 : " . $this->shuffledPossibleResponses[0] . "<br>";
        $output .= "count : " . count($this->shuffledPossibleResponses) . "<br>";

        //foreach($this->shuffledPossibleResponses as $assocArr){
        //for ($i = 0; $i < count($this->shuffledPossibleResponses); $i++) {
        //    $output .= "shuffledPossibleResponses : " . $this->shuffledPossibleResponses[$i] . "<br>";
        //}

        $output .= "THE END</p>";

        return $output;

    }

    //================================================================================

    /**
     * a general-purpose accessor method
     * @return mixed
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        
    }

    //================================================================================

    /**
     * randomly reorder the elements of the array
     * @return array
     */
    private function shuffleResponses(): array {

        $localOrderedPossibleResponses = $this->orderedPossibleResponses;
        shuffle($localOrderedPossibleResponses);
        $localShuffledPossibleResponses = $localOrderedPossibleResponses;
        
        return $localShuffledPossibleResponses;

    }


} // end class
