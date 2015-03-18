<?php # Page.php

/**
 * Project: Strobe IT CMS
 * Author: Robin Toy <robin@strobe-it.co.uk>
 * Company: Strobe Technologies Ltd T/a Strobe IT
 * File: Page.php
 * Version: 1.1
 */
// This script define the Page class

/* Class Page.
 * The class contains 11 attributes which are:
 * # id: Number
 * # creatorId: Number
 * # updaterId: Number
 * # title: String
 * # url: String
 * # content: String
 * # description: String
 * # keywords: String
 * # dateAdded: Date
 * # dateUpdated: Date
 * # subpage: Boolean
 * # mainpageid: Number
 * # error: Number = 0
 * The attributes match the corresponding database columns.
 * The class contains 19 methods:
 * + getId() : Number
 * + getCreatorId() : Number
 * + getTitle() : String
 * + getUrl() : String
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
 * + setUrl(u: String) : Void
 * + setContent(c: String) : Void
 * + setDescriptio(d: String) : Void
 * + setKeywords(k: String) : Void
*/

	class Page{
	
		// All attributes correspond to database columns
		protected $id = null;
		protected $creatorId = null;
		protected $updaterId = null;
		protected $title = null;
		protected $url = null;
		protected $content = null;
		protected $description = null;
		protected $keywords = null;
		protected $dateAdded = null;
		protected $dateUpdated = null;
		protected $subpage = null;
		protected $mainpageid = null;
		
		
		public function getId() {
			return $this->id;
		}
		
		public function getCreatorId() {
			return $this->creatorId;
		}
		
		public function getTitle() {
			return $this->title;
		}
		
		public function getUrl() {
			return $this->url;
		}
 
		public function getContent() {
			return $this->content;
		}

		public function getUpdaterId() {
			return $this->updaterId;
		}
 
		public function getDateAdded() {
			return $this->dateAdded;
		}
		
		public function getDateUpdated() {
			return $this->dateUpdated;
		}
		
		public function getDescription() {
			return $this->description;
		}
		
		public function getKeywords() {
			return $this->keywords;
		}
		
		public function getSubpage() {
			return $this->subpage;
		}
		
		public function getMainpageid() {
			return $this->mainpageid;
		}
		
		public function setUpdaterId($id) {
			$this->updaterId = $id;
		}
		
		public function setCreatorId($id) {
			$this->creatorId = $id;
		}
		
		public function setTitle($title) {
			if ($title) {
				$this->title = $title;
				return TRUE;
			} else {
				Return 'The title is empty.';
			}
		}
		
		public function setUrl($url) {
			if ($url) {
				$this->url = $url;
				return TRUE;
			} else {
				Return 'The URL is empty.';
			}
		}
		
		public function setContent($content) {
			if ($content) {
				$this->content = $content;
				return TRUE;
			} else {
				return 'The body is empty.';
			}
		}
		
		public function setSubpage($subpage) {
			if ($subpage) {
				$subpage = (int) $subpage;
			} else {
				$subpage = 0;
			}
			
			$this->subpage = $subpage;
		}
		
		public function setMainpageid($mainid) {
			if ($mainid) {
				$mainid = (int) $mainid;
			} else {
				$mainid = 1;
			}
			
			$this->mainpageid = $mainid;
		}
		
		public function setDescription($description) {
			if ($description) {
				$this->description = $description;
				return TRUE;
			} else {
				Return 'The description is empty.';
			}
		}
		
		public function setKeywords($keywords) {
			if ($keywords) {
				$this->keywords = $keywords;
				return TRUE;
			} else {
				Return 'The keywords is empty.';
			}
		}
	}
?>