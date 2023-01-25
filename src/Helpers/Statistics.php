<?php

namespace KaioSouza\Association\Helpers;

use KaioSouza\Association\Exceptions\InvalidInputToAssociate;

/**
 * Class Statistics
 * @package KaioSouza\Association\Helpers
 */
class Statistics
{

    public static function support(array $dataset, $item, $combination = null)
    {
        $length = count($dataset);
        $occurrences = 0;
        for ($i = 0; $i < $length; $i++) {
            $matchItem = in_array($item, $dataset[$i]);
            $matchCombination = $combination ? in_array($combination, $dataset[$i]) : true;
            if ($matchItem && $matchCombination)
                $occurrences++;
        }

        if (!$occurrences)
            throw new InvalidInputToAssociate;

        return $occurrences / $length;

    }

    public static function createSupportList($dataset)
    {
        $result = [];
        for ($i = 0; $i < count($dataset); $i++) {
            $length = count($dataset[$i]);

            for ($j = 0; $j < $length; $j++) {
                if (!isset($result[0][$dataset[$i][$j]]))
                    $result[0][$dataset[$i][$j]] = self::support($dataset, $dataset[$i][$j]);

                for ($k = 0; $k < $length; $k++) {
                    if (!isset($result[1][$dataset[$i][$j]][$dataset[$i][$k]]) && $dataset[$i][$j] !== $dataset[$i][$k]) {
                        $result[1][$dataset[$i][$j]][$dataset[$i][$k]] = self::support($dataset, $dataset[$i][$j], $dataset[$i][$k]);
                    }
                }
                arsort($result[1][$dataset[$i][$j]]);

            }
        }

        arsort($result[0]);

        return $result;
    }


}