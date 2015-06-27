<?php # Car_cars.php

/**
 * Project: Strobe IT CMS - Cars Module
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: Car_cars.php
 * Version: 1.0
 */
// This script define the cars class

/* Class Car_cars
 *
 * The class contains 22 attributes which are:
 * # id: Number {frozen}
 * # vehicle: String
 * # make: String
 * # model: String
 * # year: String
 * # price: Decimal
 * # vat: String
 * # fuel: String
 * # transmission: String
 * # colour: String
 * # minidescription: String
 * # features: String
 * # description: String
 * # miles: String
 * # inven_num: String
 * # pic1: String
 * # pic2: String
 * # pic3: String
 * # pic4: String
 * # pic5: String
 * # pic6: String
 * # special: String
 * The attributes match the corresponding database columns.
 *
 * The class contains xx methods:
 * + getId() : Number
 * + setId(id: Number) : Void
 * + getVehicle() : String
 * + setVehicle(veh: String) : Void
 * + getMake() : String
 * + setMake(m: String) : Void
 * + getModel() : String
 * + setModel(m: String) : Void
 * + getYear() : String
 * + setYear(y: String) : Void
 * + getPrice() : Decimal
 * + setPrice(p: Decimal) : Void
 * + getVat() : String
 * + setVat(v: String) : Void
 * + getFuel() : String
 * + setFuel(f: String) : Void
 * + getTransmission() : String
 * + setTransmission(t: String) : Void
 * + getColour() : String
 * + setColour(c: String) : Void
 * + getMinidescription() : String
 * + setMinidescription(md: String) : Void
 * + getFeatures() : String
 * + setFeatures(f: String) : Void
 * + getFulldescription() : String
 * + setFulldescription(d: String) : Void
 * + getMiles() : String
 * + setMiles(m: String) : Void
 * + getInven_num() : String
 * + setInven_num(inv: String) : Void
 * # pic1: String
 * # pic2: String
 * # pic3: String
 * # pic4: String
 * # pic5: String
 * # pic6: String
 * + getSpecial() : String
 * + setSpecial(s: String) : Void
*/

	class Car_cars {
	
		// All attributes correspond to database columns
		protected $id = null;
		protected $vehicle = null;
		protected $make = null;
		protected $model = null;
		protected $year = null;
		protected $price = null;
		protected $vat = null;
		protected $fuel = null;
		protected $transmission = null;
		protected $colour = null;
		protected $minidescription = null;
		protected $features = null;
		protected $fulldescription = null;
		protected $miles = null;
		protected $inven_num = null;
		//protected $pic1 = null;
		//protected $pic2 = null;
		//protected $pic3 = null;
		//protected $pic4 = null;
		//protected $pic5 = null;
		//protected $pic6 = null;
		protected $special = null;
		
		
		// functions / subroutines
		public function getId() {
			return $this->id;
		}
		
		public function setId($id) {
			$this->id = $id;
		}
		
		public function getVehicle() {
			return $this->vehicle;
		}
		
		public function setVehicle($veh) {
			$this->vehicle = $veh;
		}
		
		public function getMake() {
			return $this->make;
		}
		
		public function setMake($m) {
			$this->make = $m;
		}
		
		public function getModel() {
			return $this->model;
		}
		
		public function setModel($m) {
			$this->model = $m;
		}
		
		public function getYear() {
			return $this->year;
		}
		
		public function setYear($y) {
			$this->year = $y;
		}
		
		public function getPrice() {
			return $this->price;
		}
		
		public function setPrice($p) {
			if ($p) {
				$this->price = $p;
				return TRUE;
			} else {
				Return 'The price is empty.';
			}
		}
		
		public function getVat() {
			return $this->vat;
		}
		
		public function setVat($v) {
			$this->vat = $v;
		}
		
		public function getFuel() {
			return $this->fuel;
		}
		
		public function setFuel($f) {
			$this->fuel = $f;
		}
		
		public function getTransmission() {
			return $this->transmission;
		}
		
		public function setTransmission($t) {
			$this->transmission = $t;
		}
		
		public function getColour() {
			return $this->colour;
		}
		
		public function setColour($c) {
			$this->colour = $c;
		}
		
		public function getMinidescription() {
			return $this->minidescription;
		}
		
		public function setMinidescription($md) {
			$this->minidescription = $md;
		}
		
		public function getFeatures() {
			return $this->features;
		}
		
		public function setFeatures($f) {
			$this->features = $f;
		}
		
		public function getFulldescription() {
			return $this->fulldescription;
		}
		
		public function setFulldescription($d) {
			$this->fulldescription = $d;
		}
		
		public function getMiles() {
			return $this->miles;
		}
		
		public function setMiles($m) {
			$this->miles = $m;
		}
		
		public function getInven_num() {
			return $this->inven_num;
		}
		
		public function setInven_num($inv) {
			$this->inven_num = $inv;
		}
		
 /* # pic1: String
 * # pic2: String
 * # pic3: String
 * # pic4: String
 * # pic5: String
 * # pic6: String */
 
		public function getSpecial() {
			return $this->special;
		}
		
		public function setSpecial($s) {
			$this->special = $s;
		}
	}

?>