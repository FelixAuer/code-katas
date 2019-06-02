<?php

namespace Chop;

class Finder2 implements FinderInterface
{
    public function find($needle, $haystack): int
    {
        $size = sizeof($haystack);

        if ($size == 0) {
            return -1;
        }

        $middle = floor($size / 2);

        $candidate = $haystack[$middle];

        if ($candidate == $needle) {
            print $middle;
            return $middle;
        }

        if ($candidate < $needle) {
            $subsetIndex = $this->find($needle, array_slice($haystack, $middle + 1, $middle));

            if ($subsetIndex == -1) {
                return -1;
            }

            return $middle + $subsetIndex + 1;
        }

        if ($candidate > $needle) {
            $subsetIndex = $this->find($needle, array_slice($haystack, 0, $middle));

            if ($subsetIndex == -1) {
                return -1;
            }

            return $middle - ($middle - $subsetIndex) ;
        }
    }

    /**
     * Rekursiver Ansatz
     *
     * Nimmt man den Kandidaten mit rein?
     * Schwerer als man denkt das Handling der Subarrays und deren Index richtig zu machen.
     * Größte Herausforderung war es, den Index mit dem Index des rekursiven Aufrufes passend zun kombinieren,
     * da man einmal nach links und einmal nach rechts muss.
     *
     * Wieder Fehler mit > und <.
     *
     */
}
