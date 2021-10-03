<?php
namespace App\Helpers;

/**
 * Common global helper
 */
class Helper
{
    /**
     * Return coutries array
     *
     */
    public static function countriesArray()
    {
        $countries = array(
            "India",
            "Afghanistan",
            "New Zealand",
            "Philippines",
        );
        return $countries;
    }

    /*
     * States
     *
     **/

      public static function states(){
        $state = [
                "Madhya Pradesh",
                "Bihar",
                "Chhattisgarh",
                "Goa",
                "Maharashtra",
            ];
            return $state;
      }

      public static function statesFilteredArr($country){
        $stateFiltered = [
                "Afghanistan" => [
                    "Kabul", "Kandahar", "Kapisa"
                ],

                "India" => [
                    "Madhya Pradesh",
                    "Bihar",
                    "Chhattisgarh",
                    "Goa",
                    "Maharashtra",
                ],
                "New Zealand" => [
                    "Auckland", "Canterbury", "Nelson", "Otago"
                ],

                "Philippines" => [
                    "Northern Luzon", "Cordillera", "Central Luzon", "Metro Manila"

                ],
            ];
            return $country && isset($stateFiltered[$country]) ?  $stateFiltered[$country] : helper::states() ;
      }
}