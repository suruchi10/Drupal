<?php
 
/**
 * @file
 * Contains \Drupal\test_example\TestExampleConversions.
 */
 
namespace Drupal\test_example;
 
/**
 * Provide functions for converting measurements.
 *
 * @package Drupal\test_example
 */
class TestExampleConversions {
 
  /**
   * Convert Celsius to Fahrenheit
   *
   * @param $temp
   *
   * @return int
   */
  public function celsiusToFahrenheit($temp) {
    return ($temp * (9/5)) + 32;
  }
 
  /**
   * Convert centimeter to inches.
   *
   * @param $length
   *
   * @return int
   */
  public function centimeterToInch($length) {
    return $length / 2.54;
  }
 
}

