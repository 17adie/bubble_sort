<?php
class ArrayAnalyzer {
    private $arrayData;

    public function __construct($arr) {
        if (!is_array($arr)) {
            throw new Exception("Input must be an array.");
        }

        $this->arrayData = $arr;
    }

    private function bubbleSort() {
        $n = count($this->arrayData);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($this->arrayData[$j] > $this->arrayData[$j + 1]) {
                    // Swap the elements
                    $temp = $this->arrayData[$j];
                    $this->arrayData[$j] = $this->arrayData[$j + 1];
                    $this->arrayData[$j + 1] = $temp;
                }
            }
        }
    }

    public function getSortedArray() {
        $this->bubbleSort();
        return $this->arrayData;
    }

    public function getMedian() {
        $n = count($this->arrayData);

        if ($n % 2 == 0) {
            // If even number of elements, average the middle two
            $middle1 = $n / 2 - 1;
            $middle2 = $n / 2;
            return ($this->arrayData[$middle1] + $this->arrayData[$middle2]) / 2;
        } else {
            // If odd number of elements, return the middle element
            $middle = floor($n / 2);
            return $this->arrayData[$middle];
        }
    }

    public function getLargestValue() {
        $n = count($this->arrayData);
        return $this->arrayData[$n - 1];
    }
}

class ArrayAnalyzerUser {
    public static function analyzeArray($arr) {
        try {
            $analyzer = new ArrayAnalyzer($arr);
            $sortedArray = $analyzer->getSortedArray();
            $median = $analyzer->getMedian();
            $largestValue = $analyzer->getLargestValue();
            echo "Original Array: " . implode(", ", $arr) . "<br>";
            echo "Sorted Array: " . implode(", ", $sortedArray) . "<br>";
            echo "Median: $median<br>";
            echo "Largest Value: $largestValue<br>";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

// Usage example:
$arrayToAnalyze = [2, 5, 1, 7, 11, 25, 6];
ArrayAnalyzerUser::analyzeArray($arrayToAnalyze);
