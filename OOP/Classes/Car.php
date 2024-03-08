<?php

class Car {

  /* Properties | Fields */
  private $brand;
  private $color;

  /* Constructor */
  public function __construct($brand, $color = "None" /* DEFAULT Value */) {
    $this->brand = $brand;
    $this->color = $color;
  }

  /* Getter & Setter methods */
  // Getters
  public function get_brand() {
    return $this->brand;
  }

  public function get_color() {
    return $this->color;
  }

  // Setters
  public function set_brand($brand) {
    $this->brand = $brand;
  }

  public function set_color($color) {
    $allowedColors = [
      "red",
      "blue",
      "green",
      "yellow"
    ];
    if (in_array($color, $allowedColors)) {
      $this->color = $color;
    }
  }

  /* Method */

  public function get_car_info() {
    return "Brand: " . $this->brand . "<br>" . "Color: " . $this->color;
  }
  
}