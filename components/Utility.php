<?php

namespace app\components;

class Utility {

    public static function clubFacilities() {
        $clubFacilities = [
            'hasDrivingRange' => 'Driving Range',
            'hasPracticeGround' => 'Practice Ground',
            'hasPracticeNet' => 'Practice Net',
            'hasPuttingGreen' => 'Putting Green',
            'hasSwingStudio' => 'Swing Studio',
            'hasBuggyHire' => 'Buggy Hire',
            'hasTrolleyHire' => 'Trolley Hire',
            'hasSociety' => 'Allows Society Days',
            'hasVenueHire' => 'Venue Hire',
            'hasShowers' => 'Showers',
            'hasSnooker' => 'Snooker',
            'hasGym' => 'Gym',
            'hasSwimming' => 'Swimming Pool',
            'hasAccommdation' => 'Accommdation'
        ];

        return $clubFacilities;
    }

    public static function getPersonTitles() {
        $titles = [
            'Mr.' => 'Mr.',
            'Master' => 'Master',
            'Mrs.' => 'Mrs.',
            'Miss' => 'Miss',
            'Ms.' => 'Ms.',
            'Prof.' => 'Prof.',
        ];

        return $titles;
    }

}

?>