<?php # Est_Property.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: Est_Property.php
 * Version: 1.0
 */
// This script define the Est_Property class

/* Class Est_Property.
 * The class contains 41 attributes which are:
 * # PROP_REF: Number								8653
 * # PROP_PRICE_PREFIX: String						Asking price
 * # PROP_Price: Number								8000
 * # PROP_TENURE: String							Leasehold
 * # PROP_HOUSE_TYPE: String						Commercial
 * # PROP_STATUS: String							Viewing
 * # PROP_BED: Number								4
 * # PROP_NAME: String								Unit C1, The Tannery, Cullompton
 * # PROP_ADDRESS: String							Exeter Road, Cullompton
 * # PROP_POSTCODE: String							EX151DT
 * # PROP_SUMMARY: String							<HTML & Text>
 * # PROP_DETAILED: String							<HTML & Text>
 * # PROP_MAIN_LOC: String							PictureName.EXT
 * # PROP_MAIN_CAPTION: String						Caption of Picture
 * # PROP_ADD1_LOC: String							PictureName.EXT
 * # PROP_ADD1_CAPTION: String						Caption of Picture
 * # PROP_ADD2_LOC: String							PictureName.EXT
 * # PROP_ADD2_CAPTION: String						Caption of Picture
 * # PROP_ADD3_LOC: String							PictureName.EXT
 * # PROP_ADD3_CAPTION: String						Caption of Picture
 * # PROP_MAP1_LOC: String							PictureName.EXT			
 * # PROP_MAP1_CAPTION: String						Caption of Picture
 * # PROP_MAP2_LOC: String							PictureName.EXT
 * # PROP_MAP2_CAPTION: String						Caption of Picture
 * # PROP_MAP3_LOC: String							PictureName.EXT
 * # PROP_MAP3_CAPTION: String						Caption of Picture
 * # PROP_SHOW_NAME: Character						1
 * # PROP_KEY: Number								2221
 * # PROP_ADD4_LOC: String							Needed???
 * # PROP_ADD4_CAPTION: String						Needed???
 * # PROP_ADD_DATE: Date							2013-07-11
 * # PROP_CONDITION: Character						Y
 * # PROP_COPYRIGHT: Character						Y
 * # PROP_PRICE_TEXT: String						£650 per calendar month
 * # PROP_FISH: Character							N
 * # PROP_RIGHTMOVE: Character						Y
 * # PROP_COMING_SOON: Character					N
 * # PROP_EER_CUR: String (3 Characters)			63
 * # PROP_EER_POT: String (3 Characters)			72
 * # PROP_EIR_CUR: String (3 Characters)			58
 * # PROP_EIR_POT: String (3 Characters)			68
 * The attributes match the corresponding database columns.
 * The class contains 19 methods:
 * + getId() : Number
 * + getCreatorId() : Number
 * + getTitle() : String
 * + getError() : String
 * + getContent() : String
 * + getUpdaterId() : Number
 * + getDateAdded() : Date
 * + getDateUpdated() : Date
 * + getDescription() : String
 * + getKeywords() : String
 * # setUpdaterId(d: Date) : Void
 * # setDateUpdated(d: Date) : Void
 * + setTitle(t: String) : Void
 * + setContent(c: String) : Void
 * + setDescriptio(d: String) : Void
 * + setKeywords(k: String) : Void
 * + updatePage() : Void
 * + retrievePage(id: Number) : Boolean
 * + createPage(title: String, content: String, description: String, keywords: String) : Void
*/

	class Est_Property{
	
		// All attributes correspond to database columns
		protected $PROP_REF = null;
 		protected $PROP_PRICE_PREFIX = null;
  		protected $PROP_PRICE = null;
  		protected $PROP_TENURE = null;
  		protected $PROP_HOUSE_TYPE = null;
  		protected $PROP_STATUS = null;
  		protected $PROP_BED = null;
  		protected $PROP_NAME = null;
  		protected $PROP_ADDRESS = null;
  		protected $PROP_POSTCODE = null;
  		protected $PROP_SUMMARY = null;
  		protected $PROP_DETAILED = null;
  		protected $PROP_MAIN_LOC = null;
  		protected $PROP_MAIN_CAPTION = null;
  		protected $PROP_ADD1_LOC = null;
  		protected $PROP_ADD1_CAPTION = null;
  		protected $PROP_ADD2_LOC = null;
  		protected $PROP_ADD2_CAPTION = null;
  		protected $PROP_ADD3_LOC = null;
  		protected $PROP_ADD3_CAPTION = null;
  		protected $PROP_MAP1_LOC = null;
  		protected $PROP_MAP1_CAPTION = null;
  		protected $PROP_MAP2_LOC = null;
  		protected $PROP_MAP2_CAPTION = null;
  		protected $PROP_MAP3_LOC = null;
  		protected $PROP_MAP3_CAPTION = null;
  		protected $PROP_SHOW_NAME = null;
  		protected $PROP_KEY = null;
  		protected $PROP_ADD4_LOC = null;
  		protected $PROP_ADD4_CAPTION = null;
  		protected $PROP_ADD_DATE = null;
  		protected $PROP_CONDITION = null;
  		protected $PROP_COPYRIGHT = null;
  		protected $PROP_PRICE_TEXT = null;
  		protected $PROP_FISH = null;
  		protected $PROP_RIGHTMOVE = null;
  		protected $PROP_COMING_SOON = null;
  		protected $PROP_EER_CUR = null;
  		protected $PROP_EER_POT = null;
  		protected $PROP_EIR_CUR = null;
  		protected $PROP_EIR_POT = null;
		
		
		public function getPROP_REF() {
			return $this->PROP_REF;
		}
		
 		public function getPROP_PRICE_PREFIX() {
			return $this->PROP_PRICE_PREFIX;
		}
		
  		public function getPROP_PRICE() {
			return $this->PROP_PRICE;
		}
		
  		public function getPROP_TENURE() {
			return $this->PROP_TENURE;
		}
		
  		public function getPROP_HOUSE_TYPE() {
			return $this->PROP_HOUSE_TYPE;
		}
		
  		public function getPROP_STATUS() {
			return $this->PROP_STATUS;
		}
		
  		public function getPROP_BED() {
			return $this->PROP_BED;
		}
		
  		public function getPROP_NAME() {
			return $this->PROP_NAME;
		}
		
  		public function getPROP_ADDRESS() {
			return $this->PROP_ADDRESS;
		}
		
  		public function getPROP_POSTCODE() {
			return $this->PROP_POSTCODE;
		}
		
  		public function getPROP_SUMMARY() {
			return $this->PROP_SUMMARY;
		}
		
  		public function getPROP_DETAILED() {
			return $this->PROP_DETAILED;
		}
		
  		public function getPROP_MAIN_LOC() {
			return $this->PROP_MAIN_LOC;
		}
		
  		public function getPROP_MAIN_CAPTION() {
			return $this->PROP_MAIN_CAPTION;
		}
		
  		public function getPROP_ADD1_LOC() {
			return $this->PROP_ADD1_LOC;
		}
		
  		public function getPROP_ADD1_CAPTION() {
			return $this->PROP_ADD1_CAPTION;
		}
		
  		public function getPROP_ADD2_LOC() {
			return $this->PROP_ADD2_LOC;
		}
		
  		public function getPROP_ADD2_CAPTION() {
			return $this->PROP_ADD2_CAPTION;
		}
		
  		public function getPROP_ADD3_LOC() {
			return $this->PROP_ADD3_LOC;
		}
		
  		public function getPROP_ADD3_CAPTION() {
			return $this->PROP_ADD3_CAPTION;
		}
		
  		public function getPROP_MAP1_LOC() {
			return $this->PROP_MAP1_LOC;
		}
		
  		public function getPROP_MAP1_CAPTION() {
			return $this->PROP_MAP1_CAPTION;
		}
		
  		public function getPROP_MAP2_LOC() {
			return $this->PROP_MAP2_LOC;
		}
		
  		public function getPROP_MAP2_CAPTION() {
			return $this->PROP_MAP2_CAPTION;
		}
		
  		public function getPROP_MAP3_LOC() {
			return $this->PROP_MAP3_LOC;
		}
		
  		public function getPROP_MAP3_CAPTION() {
			return $this->PROP_MAP3_CAPTION;
		}
		
  		public function getPROP_SHOW_NAME() {
			return $this->PROP_SHOW_NAME;
		}
		
  		public function getPROP_KEY() {
			return $this->PROP_KEY;
		}
		
  		public function getPROP_ADD4_LOC() {
			return $this->PROP_ADD4_LOC;
		}
		
  		public function getPROP_ADD4_CAPTION() {
			return $this->PROP_ADD4_CAPTION;
		}
		
  		public function getPROP_ADD_DATE() {
			return $this->PROP_ADD_DATE;
		}
		
  		public function getPROP_CONDITION() {
			return $this->PROP_CONDITION;
		}
		
  		public function getPROP_COPYRIGHT() {
			return $this->PROP_COPYRIGHT;
		}
		
  		public function getPROP_PRICE_TEXT() {
			return $this->PROP_PRICE_TEXT;
		}
		
  		public function getPROP_FISH() {
			return $this->PROP_FISH;
		}
		
  		public function getPROP_RIGHTMOVE() {
			return $this->PROP_RIGHTMOVE;
		}
		
  		public function getPROP_COMING_SOON() {
			return $this->PROP_COMING_SOON;
		}
		
  		public function getPROP_EER_CUR() {
			return $this->PROP_EER_CUR;
		}
		
  		public function getPROP_EER_POT() {
			return $this->PROP_EER_POT;
		}
		
  		public function getPROP_EIR_CUR() {
			return $this->PROP_EIR_CUR;
		}
		
  		public function getPROP_EIR_POT() {
			return $this->PROP_EIR_POT;
		}
		
		public function setPROP_REF($ref) {
			$this->PROP_REF = $ref;
		}
		
 		public function setPROP_PRICE_PREFIX($price_prefix) {
			$this->PROP_PRICE_PREFIX = $price_prefix;
		}
		
  		public function setPROP_PRICE($price) {
			$this->PROP_PRICE = $price;
		}
		
  		public function setPROP_TENURE($tenure) {
			$this->PROP_TENURE = $tenure;
		}
		
  		public function setPROP_HOUSE_TYPE($house_type) {
			$this->PROP_HOUSE_TYPE = $house_type;
		}
		
  		public function setPROP_STATUS($status) {
			$this->PROP_STATUS = $status;
		}
		
  		public function setPROP_BED($bed) {
			$this->PROP_BED = $bed;
		}
		
  		public function setPROP_NAME($name) {
			$this->PROP_NAME = $name;
		}
		
  		public function setPROP_ADDRESS($address) {
			$this->PROP_ADDRESS = $address;
		}
		
  		public function setPROP_POSTCODE($postcode) {
			$this->PROP_POSTCODE = $postcode;
		}
		
  		public function setPROP_SUMMARY($summary) {
			$this->PROP_SUMMARY = $summary;
		}
		
  		public function setPROP_DETAILED($detailed) {
			$this->PROP_DETAILED = $detailed;
		}
		
  		public function setPROP_MAIN_LOC($main_loc) {
			$this->PROP_MAIN_LOC = $main_loc;
		}
		
  		public function setPROP_MAIN_CAPTION($main_cap) {
			$this->PROP_MAIN_CAPTION = $main_cap;
		}
		
  		public function setPROP_ADD1_LOC($add1_loc) {
			$this->PROP_ADD1_LOC = $add1_loc;
		}
		
  		public function setPROP_ADD1_CAPTION($add1_cap) {
			$this->PROP_ADD1_CAPTION = $add1_cap;
		}
		
  		public function setPROP_ADD2_LOC($add2_loc) {
			$this->PROP_ADD2_LOC = $add2_loc;
		}
		
  		public function setPROP_ADD2_CAPTION($add2_cap) {
			$this->PROP_ADD2_CAPTION = $add2_cap;
		}
		
  		public function setPROP_ADD3_LOC($add3_loc) {
			$this->PROP_ADD3_LOC = $add3_loc;
		}
		
  		public function setPROP_ADD3_CAPTION($add3_cap) {
			$this->PROP_ADD3_CAPTION = $add3_cap;
		}
		
  		public function setPROP_MAP1_LOC($map1_loc) {
			$this->PROP_MAP1_LOC = $map1_loc;
		}
		
  		public function setPROP_MAP1_CAPTION($map1_cap) {
			$this->PROP_MAP1_CAPTION = $map1_cap;
		}
		
  		public function setPROP_MAP2_LOC($map2_loc) {
			$this->PROP_MAP2_LOC = $map2_loc;
		}
		
  		public function setPROP_MAP2_CAPTION($map2_cap) {
			$this->PROP_MAP2_CAPTION = $map2_cap;
		}
		
  		public function setPROP_MAP3_LOC($map3_loc) {
			$this->PROP_MAP3_LOC = $map3_loc;
		}
		
  		public function setPROP_MAP3_CAPTION($map3_cap) {
			$this->PROP_MAP3_CAPTION = $map3_cap;
		}
		
  		public function setPROP_SHOW_NAME($show_name) {
			$this->PROP_SHOW_NAME = $show_name;
		}
		
  		public function setPROP_KEY($key) {
			$this->PROP_KEY = $key;
		}
		
  		public function setPROP_ADD4_LOC($add4_loc) {
			$this->PROP_ADD4_LOC = $add4_loc;
		}
		
  		public function setPROP_ADD4_CAPTION($add4_cap) {
			$this->PROP_ADD4_CAPTION = $add4_cap;
		}
		
  		public function setPROP_ADD_DATE($add_date) {
			$this->PROP_ADD_DATE = $add_date;
		}
		
  		public function setPROP_CONDITION($condition) {
			$this->PROP_CONDITION = $condition;
		}
		
  		public function setPROP_COPYRIGHT($copyright) {
			$this->PROP_COPYRIGHT = $copyright;
		}
		
  		public function setPROP_PRICE_TEXT($price_text) {
			$this->PROP_PRICE_TEXT = $price_text;
		}
		
  		public function setPROP_FISH($fish) {
			$this->PROP_FISH = $fish;
		}
		
  		public function setPROP_RIGHTMOVE($rightmove) {
			$this->PROP_RIGHTMOVE = $rightmove;
		}
		
  		public function setPROP_COMING_SOON($coming_soon) {
			$this->PROP_COMING_SOON = $coming_soon;
		}
		
  		public function setPROP_EER_CUR($eer_cur) {
			$this->PROP_EER_CUR = $eer_cur;
		}
		
  		public function setPROP_EER_POT($eer_pot) {
			$this->PROP_EER_POT = $eer_pot;
		}
		
  		public function setPROP_EIR_CUR($eir_cur) {
			$this->PROP_EIR_CUR = $eir_cur;
		}
		
  		public function setPROP_EIR_POT($eir_pot) {
			$this->PROP_EIR_POT = $eir_pot;
		}
	}
?>