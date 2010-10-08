<?php
/**
 * Copyright (c) STMicroelectronics, 2010. All Rights Reserved.
 *
 * This file is a part of Codendi.
 *
 * Codendi is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Codendi is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Codendi. If not, see <http://www.gnu.org/licenses/>.
 */

require_once (dirname(__FILE__).'/../../../docman/include/Docman_ItemFactory.class.php');
require_once ('WebDAVDocmanDocument.class.php');
require_once ('WebDAVDocmanFile.class.php');

/**
 * This class Represents Docman folders in WebDAV
 *
 * It's an implementation of the abstract class Sabre_DAV_Directory methods
 */
class WebDAVDocmanFolder extends Sabre_DAV_Directory {

    private $user;
    private $project;
    private $maxFileSize;
    private $folder;

    /**
     * Constructor of the class
     *
     * @param User $user
     * @param Project $project
     * @param Integer $maxFileSize
     * @param Docman_Folder $folder
     *
     * @return void
     */
    function __construct($user, $project, $maxFileSize, $folder) {
        $this->user = $user;
        $this->project = $project;
        $this->maxFileSize = $maxFileSize;
        $this->folder = $folder;
    }

    /**
     * Returns the content of the folder
     * including indication about duplicate entries
     *
     * @return Array
     */
    function getChildList() {
        $children = array();
        // hey ! for docman never add something in WebDAVUtils, docman may be not present ;)
        $dif = $this->getDocmanItemFactory();
        $nodes = $dif->getChildrenFromParent($this->getItem());
        foreach ($nodes as $node) {
            if ($this->getDocmanPermissionsManager()->userCanAccess($this->getUser(), $node->getId())) {
                $class = get_class($node);
                switch ($class) {
                    case 'Docman_File':
                        $item = $dif->getItemFromDb($node->getId());
                        $version = $item->getCurrentVersion();
                        $index = $version->getFilename();
                        $method = 'getWebDAVDocmanFile';
                        break;
                    case 'Docman_EmbeddedFile':
                        $index = $node->getTitle();
                        $method = 'getWebDAVDocmanFile';
                        break;
                    case 'Docman_Empty':
                    case 'Docman_Wiki':
                    case 'Docman_Link':
                        $index = $node->getTitle();
                        $method = 'getWebDAVDocmanDocument';
                        break;
                    default:
                        $index = $node->getTitle();
                        $method = 'getWebDAVDocmanFolder';
                        break;
                }

                if (!isset($children[$index])) {
                    $children[$index] = call_user_func(array($this,$method), $node);
                } else {
                    // When it's a duplicate say it, so it can be processed later
                    $children[$index] = 'duplicate';
                }
            }
        }
        return $children;
    }

    /**
     * Returns the visible content of the folder
     *
     * @return Array
     *
     * @see plugins/webdav/include/lib/Sabre/DAV/Sabre_DAV_ICollection::getChildren()
     */
    function getChildren() {
        $children = $this->getChildList();
        // Remove all duplicate elements
        foreach ($children as $key => $node) {
            if ($node === 'duplicate') {
                unset($children[$key]);
            }
        }
        return $children;
    }

    /**
     * Returns the given node
     *
     * @param String $name
     *
     * @return Docman_Item
     *
     * @see plugins/webdav/include/lib/Sabre/DAV/Sabre_DAV_Directory::getChild()
     */
    function getChild($name) {
        $name = $this->getUtils()->retrieveName($name);
        $children = $this->getChildList();
        if (!isset($children[$name])) {
            throw new Sabre_DAV_Exception_FileNotFound($GLOBALS['Language']->getText('plugin_webdav_common', 'docman_item_not_available'));
        } elseif ($children[$name] === 'duplicate') {
            throw new Sabre_DAV_Exception_Conflict($GLOBALS['Language']->getText('plugin_webdav_common', 'docman_item_duplicated'));
        } else {
            return $children[$name];
        }
    }

    /**
     * Returns the name of the folder
     *
     * @return String
     *
     * @see plugins/webdav/include/lib/Sabre/DAV/Sabre_DAV_INode::getName()
     */
    function getName() {
        if (!$this->getItem()->getParentId()) {
            // case of the root
            return 'Documents';
        }
        $utils = $this->getUtils();
        return $utils->unconvertHTMLSpecialChars($this->getItem()->getTitle());
    }

    /**
     * Returns the last modification date
     *
     * @return date
     *
     * @see plugins/webdav/include/lib/Sabre/DAV/Sabre_DAV_Node::getLastModified()
     */
    function getLastModified() {
        return $this->getItem()->getUpdateDate();
    }

    /**
     * Returns the represented folder
     *
     * @return Docman_Folder
     */
    function getItem() {
        return $this->folder;
    }

    /**
     * Returns the project
     *
     * @return Project
     */
    function getProject() {
        return $this->project;
    }

    /**
     * Returns the user
     *
     * @return User
     */
    function getUser() {
        return $this->user;
    }

    /**
     * Returns the max file size
     *
     * @return Integer
     */
    function getMaxFileSize() {
        return $this->maxFileSize;
    }

    /**
     * Returns an instance of WebDAVUtils
     *
     * @return WebDAVUtils
     */
    function getUtils() {
        return WebDAVUtils::getInstance();
    }

    /**
     * Returns a new WebDAVDocmanFile
     *
     * @params Docman_File $item
     *
     * @return WebDAVDocmanFile
     */
    function getWebDAVDocmanFile($item) {
        return new WebDAVDocmanFile($this->user, $this->getProject(), $this->getMaxFileSize(), $item);
    }

    /**
     * Returns a new WebDAVDocmanEmpty
     *
     * @params mixed $item
     *
     * @return WebDAVDocmanEmpty
     */
    function getWebDAVDocmanDocument($item) {
        return new WebDAVDocmanDocument($this->user, $this->getProject(), $this->getMaxFileSize(), $item);
    }

    /**
     * Returns a new WebDAVDocmanFolder
     *
     * @params Docman_Folder $folder
     *
     * @return WebDAVDocmanFolder
     */
    function getWebDAVDocmanFolder($folder) {
        return new WebDAVDocmanFolder($this->user, $this->getProject(), $this->getMaxFileSize(), $folder);
    }

    /**
     * Returns a new instance of ItemFactory
     *
     * @return Docman_ItemFactory
     */
    function getDocmanItemFactory() {
        return new Docman_ItemFactory();
    }

    /**
     * Returns an instance of PermissionsManager
     *
     * @return Docman_PermissionsManager
     */
    function getDocmanPermissionsManager() {
        return Docman_PermissionsManager::instance($this->getProject()->getGroupId());
    }

}

?>