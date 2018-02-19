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


		/*public function add() {
			// Automatically run when "Add" (add.php) template is rendered.
		}*/

		/*public function edit() {
			// Automatically run when block is edited (inline or dialog)
		}*/

		/*public function validate($data) {
			//$file = $this->getFileObject();
			$error = Core::make('error');

			if (empty($data['personName']) || empty($data['personDesc'])) {
				$e->add(t('Both "Name" and "Description" fields must be populated.'));
			}
			
			if (empty($data['altText'])) {
				$data['altText'] = $data['personName'] . ": " . $data['personDesc'];
			}

			if(empty($data['imgID'])) {
				$e->add(t('An image is required.'));
			}
			// if (!is_object($file) || $file->isError() || !$file->getFileID()) {
            // $e->add(t('You must specify a valid image file.'));
			return $e;
		}*/

		public function save($data) {
		    $data['imgID'] = ($data['imgID'] != '') ? intval($data['imgID']) : 0;

		    /*$e = Core::make('error');
        	if (!$data['imgID']) {
            	$e->add(t('You must select an image.'));
        	}
        	return $e;*/

		    
			
			if (empty($data['altText'])) {
				$data['altText'] = $data['personName'] . ": " . $data['personDesc'];
			}    		
			
    		parent::save($data);
		}

		public function getContent() {
			return $this->content;
		}

		/*public function getSearchableContent(){
			return $this->content;
		}*/

		/*function br2nl($str) {
			$str = str_replace("\r\n", "\n", $str);
			$str = str_replace("<br />\n", "\n", $str);
			return $str;
		}*/

        /*public function registerViewAssets($outputContent)
        {
            if (preg_match('/data-concrete5-link-lightbox/i', $outputContent)) {
                $this->requireAsset('core/lightbox');
            }
        }*/

        public function view()
        {
            $this->set('content', $this->getContent());
        }

		/*function getContentEditMode() {
			return LinkAbstractor::translateFromEditMode($this->content);
		}*/

		/*public function getImportData($blockNode) {
			$content = $blockNode->data->record->content;
			$content = LinkAbstractor::import($content);
			$args = array('content' => $content);
			return $args;
		}*/

		// Currently no need for a custom export routine
		/*public function export(\SimpleXMLElement $blockNode) {
			$data = $blockNode->addChild('data');
			$data->addAttribute('table', $this->btTable);
			$record = $data->addChild('record');
			$cnode = $record->addChild('content');
			$node = dom_import_simplexml($cnode);
			$no = $node->ownerDocument;
			$content = LinkAbstractor::export($this->content);
			$cdata = $no->createCDataSection($content);
			$node->appendChild($cdata);
		}*/

		/*function save($args) {
			$args['content'] = LinkAbstractor::translateTo($args['content']);
			parent::save($args);
		}*/

	}

?>
