<?php

namespace Company\Plugins\PluginName\Tests;

use Company\Plugins\PluginName\Utilities\WP_Filesystem_Utility;
use PHPUnit\Framework\TestCase;

class WP_Filesystem_UtilityTest extends TestCase {

    public function testGetBase64EncodedContents() {
        $filesystemUtility = new WP_Filesystem_Utility();

        // Replace with the actual path to the SVG file you want to test
        $svgFilePath = __DIR__ . '/../src/public/icons/cpt-icon.svg';

        // Ensure that the file exists before testing
        $this->assertFileExists($svgFilePath);

        // Get the expected base64 encoded content
        $expectedBase64Content = base64_encode(file_get_contents($svgFilePath));

        // Call the method to get base64 encoded content
        $actualBase64Content = $filesystemUtility->get_base64_encoded_contents($svgFilePath);

        // Check if the actual content matches the expected content
        $this->assertEquals($expectedBase64Content, $actualBase64Content);
    }

    // Add more test cases as needed for other methods/functions in WP_Filesystem_Utility
}
