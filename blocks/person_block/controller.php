<?php
namespace Application\Block\PersonBlock;

use Concrete\Core\Block\BlockController;
use Core;
//use \Concrete\Core\Editor\LinkAbstractor;

/**
 * The controller for the content block.
 *
 * @package Blocks
 * @subpackage Content
 * @author Andrew Embler <andrew@concrete5.org>
 * @copyright  Copyright (c) 2003-2012 Concrete5. (http://www.concrete5.org)
 * @license    http://www.concrete5.org/license/     MIT License
 *
 */
	class Controller extends BlockController {

		// Config
		protected $btTable = 'btPersonBlock';
		protected $btInterfaceWidth = "800";
		protected $btInterfaceHeight = "600";

		protected $btCacheBlockRecord = true;
		protected $btCacheBlockOutput = true;
		protected $btCacheBlockOutputOnPost = true;

		protected $btSupportsInlineEdit = false;
		protected $btSupportsInlineAdd = false;

		protected $btCacheBlockOutputForRegisteredUsers = false;
		protected $btCacheBlockOutputLifetime = 0; //until manually updated or cleared

		// Required Methods
		public function getBlockTypeName() {
			return t("Person");
		}

		public function getBlockTypeDescription() {
			return t("Photo + Name + Description");
		}



		public function save($data) {
		    $data['imgID'] = ($data['imgID'] != '') ? intval($data['imgID']) : 0;

			
			if (empty($data['altText'])) {
				$data['altText'] = $data['personName'] . ": " . $data['personDesc'];
			}    		
			
    		parent::save($data);
		}

		public function getContent() {
			return $this->content;
		}


        public function view()
        {
            $this->set('content', $this->getContent());
        }

	}

?>
