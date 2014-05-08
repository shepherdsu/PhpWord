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

namespace PhpOffice\PhpWord\Tests\Element;

use PhpOffice\PhpWord\Element\TextBox;

/**
 * Test class for PhpOffice\PhpWord\Element\TextBox
 *
 * @coversDefaultClass \PhpOffice\PhpWord\Element\TextBox
 * @runTestsInSeparateProcesses
 */
class TextBoxTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Create new instance
     */
    public function testConstruct()
    {
        $oTextBox = new TextBox('section', 1);
    
        $this->assertInstanceOf('PhpOffice\\PhpWord\\Element\\TextBox', $oTextBox);
        $this->assertEquals($oTextBox->getStyle(), null);
    }

    /**
     * Get style name
     */
    public function testStyleText()
    {
        $oTextBox = new TextBox('section', 1, 'textBoxStyle');
    
        $this->assertEquals($oTextBox->getStyle(), 'textBoxStyle');
    }
    
    /**
     * Get style array
     */
    public function testStyleArray()
    {
        $oTextBox = new TextBox(
            'section',
            1,
            array(
                'width' => \PhpOffice\PhpWord\Shared\Drawing::centimetersToPixels(4.5),
                'height' => \PhpOffice\PhpWord\Shared\Drawing::centimetersToPixels(17.5),
                'positioning' => 'absolute',
                'marginLeft' => \PhpOffice\PhpWord\Shared\Drawing::centimetersToPixels(15.4),
                'marginTop' => \PhpOffice\PhpWord\Shared\Drawing::centimetersToPixels(9.9),
                'stroke' => 0,
                'innerMargin' => 0,
                'borderSize' => 1,
                'borderColor' => ''
            )
        );
    
        $this->assertInstanceOf('PhpOffice\\PhpWord\\Style\\TextBox', $oTextBox->getStyle());
    }
}
