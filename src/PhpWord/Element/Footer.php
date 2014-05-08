<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Element;

/**
 * Footer element
 */
class Footer extends AbstractContainer
{
    /**
     * Header/footer types constants
     *
     * @var string
     * @link http://www.schemacentral.com/sc/ooxml/a-wtype-4.html Header or Footer Type
     */
    const AUTO  = 'default';  // default and odd pages
    const FIRST = 'first';
    const EVEN  = 'even';

    /**
     * Container type
     *
     * @var string
     */
    protected $container = 'footer';

    /**
     * Header type
     *
     * @var string
     */
    protected $type = self::AUTO;

    /**
     * Create new instance
     *
     * @param int $sectionId
     * @param int $containerId
     * @param string $type
     */
    public function __construct($sectionId, $containerId = 1, $type = self::AUTO)
    {
        $this->sectionId = $sectionId;
        $this->setType($type);
        $this->setDocPart($this->container, ($sectionId - 1) * 3 + $containerId);
    }

    /**
     * Set type
     *
     * @param string $value
     * @since 0.10.0
     */
    public function setType($value = self::AUTO)
    {
        if (!in_array($value, array(self::AUTO, self::FIRST, self::EVEN))) {
            $value = self::AUTO;
        }
        $this->type = $value;
    }

    /**
     * Get type
     *
     * @return string
     * @since 0.10.0
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Reset type to default
     *
     * @return string
     */
    public function resetType()
    {
        return $this->type = self::AUTO;
    }

    /**
     * First page only header
     *
     * @return string
     */
    public function firstPage()
    {
        return $this->type = self::FIRST;
    }

    /**
     * Even numbered pages only
     *
     * @return string
     */
    public function evenPage()
    {
        return $this->type = self::EVEN;
    }

    /**
     * Add textbox element
     *
     * @param mixed $style
     * @return \PhpOffice\PhpWord\Element\TextBox
     * @todo Merge with the same function on Section
     */
    public function addTextBox($style = null)
    {
        $textbox = new TextBox($this->getDocPart(), $this->getDocPartId(), $style);
        $this->addElement($textbox);
    
        return $textbox;
    }
    
    /**
     * Add table element
     *
     * @param mixed $style
     * @return \PhpOffice\PhpWord\Element\Table
     * @todo Merge with the same function on Section
     */
    public function addTable($style = null)
    {
        $table = new Table($this->getDocPart(), $this->getDocPartId(), $style);
        $this->addElement($table);

        return $table;
    }
}
