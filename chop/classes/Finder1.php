<?php

namespace Chop;

class Finder1 implements FinderInterface
{
    public function find($needle, $haystack): int
    {
        $left = 0;
        $right = sizeof($haystack) - 1;

        while ($left <= $right) {
            $middle = floor(($left + $right) / 2);

            $candidate = $haystack[$middle];

            if ($candidate == $needle) {
                return $middle;
            }

            if ($candidate < $needle) {
                $left = $middle + 1;
            }
            if ($candidate > $needle) {
                $right = $middle - 1;
            }
        }

        return -1;
    }
}
    /**
     * Die Frage stellt sich, ob man bei ungeraden Wert auf oder abrunden soll.
     *
     * Erster Ansatz war NUR über die Länge des zu durchsuchenden Arrays, das geht natürlich nicht.
     *
     * Wann welche Variable (left, right) gesetzt werden muss war mir nicht klar.
     * < ist nicht das Gegenteil von >
     *
     */
