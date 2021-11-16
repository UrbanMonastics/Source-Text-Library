<?php

require 'SampleExtensions.php';

use PHPUnit\Framework\TestCase;
use UrbanMonastics\SourceTextLibrary\SourceTextLibrary as SourceTextLibrary;

class SourceTextLibraryTest extends TestCase
{
    final function __construct($name = null, array $data = array(), $dataName = '')
    {
        $this->dirs = $this->initDirs();
        $this->SourceTextLibrary = $this->initSourceTextLibrary();

        parent::__construct($name, $data, $dataName);
    }

    private $dirs;
    protected $SourceTextLibrary;

    /**
     * @return array
     */
    protected function initDirs()
    {
        $dirs []= dirname(__FILE__).'/data/';

        return $dirs;
    }

    /**
     * @return SourceTextLibrary
     */
    protected function initSourceTextLibrary()
    {
        $SourceTextLibrary = new TestSourceTextLibrary();
        return $SourceTextLibrary;
    }

    /**
     * @dataProvider data
     * @param $test
     * @param $dir
     */
    function test_($test, $dir)
    {
        $markdown = file_get_contents($dir . $test . '.md');

        $expectedMarkup = file_get_contents($dir . $test . '.html');

        $expectedMarkup = str_replace("\r\n", "\n", $expectedMarkup);
        $expectedMarkup = str_replace("\r", "\n", $expectedMarkup);

        $this->SourceTextLibrary->setSafeMode(substr($test, 0, 3) === 'xss');
        $this->SourceTextLibrary->setStrictMode(substr($test, 0, 6) === 'strict');

		// Add support for Liturgical Elements
        $this->SourceTextLibrary->setLiturgicalElements(substr( $test, 0, 7) === 'liturgy');
        $this->SourceTextLibrary->setPreserveIndentations(substr( $test, 0, 11) === 'indentation');
        $this->SourceTextLibrary->setLiturgicalHTML( strpos( $test, '_lesstags_') === false );
        $this->SourceTextLibrary->setSelahHTML( stripos( $test, 'selah' ) !== false, 'Selah' );
		if( stripos( $test, 'selah_termed' ) !== false ){
	        $this->SourceTextLibrary->setSelahHTML( true, 'OtherSelah'  );
		}
        $this->SourceTextLibrary->setSmallCapsText( stripos( $test, 'small_caps' ) !== false );
        $this->SourceTextLibrary->setSuppressAlleluia( stripos( $test, 'supress_alleluia' ) !== false, 'Alleluia' );
		if( stripos( $test, 'supress_alleluia_termed' ) !== false ){
	        $this->SourceTextLibrary->setSuppressAlleluia( stripos( $test, 'supress_alleluia' ) !== false, 'OtherAlleluia' );
		}

        $actualMarkup = $this->SourceTextLibrary->text( $markdown );

        $this->assertEquals($expectedMarkup, $actualMarkup, "This Test: " . $test );
    }

    function testRawHtml()
    {
        $markdown = "```php\nfoobar\n```";
        $expectedMarkup = '<pre><code class="language-php"><p>foobar</p></code></pre>';
        $expectedSafeMarkup = '<pre><code class="language-php">&lt;p&gt;foobar&lt;/p&gt;</code></pre>';

        $unsafeExtension = new UnsafeExtension;
        $actualMarkup = $unsafeExtension->text($markdown);

        $this->assertEquals($expectedMarkup, $actualMarkup);

        $unsafeExtension->setSafeMode(true);
        $actualSafeMarkup = $unsafeExtension->text($markdown);

        $this->assertEquals($expectedSafeMarkup, $actualSafeMarkup);
    }

    function testTrustDelegatedRawHtml()
    {
        $markdown = "```php\nfoobar\n```";
        $expectedMarkup = '<pre><code class="language-php"><p>foobar</p></code></pre>';
        $expectedSafeMarkup = $expectedMarkup;

        $unsafeExtension = new TrustDelegatedExtension;
        $actualMarkup = $unsafeExtension->text($markdown);

        $this->assertEquals($expectedMarkup, $actualMarkup);

        $unsafeExtension->setSafeMode(true);
        $actualSafeMarkup = $unsafeExtension->text($markdown);

        $this->assertEquals($expectedSafeMarkup, $actualSafeMarkup);
    }

    function data()
    {
        $data = array();

        foreach ($this->dirs as $dir)
        {
            $Folder = new DirectoryIterator($dir);

            foreach ($Folder as $File)
            {
                /** @var $File DirectoryIterator */

                if ( ! $File->isFile())
                {
                    continue;
                }

                $filename = $File->getFilename();

                $extension = pathinfo($filename, PATHINFO_EXTENSION);

                if ($extension !== 'md')
                {
                    continue;
                }

                $basename = $File->getBasename('.md');

                if (file_exists($dir . $basename . '.html'))
                {
                    $data []= array($basename, $dir);
                }
            }
        }

        return $data;
    }

    public function test_no_markup()
    {
        $markdownWithHtml = <<<MARKDOWN_WITH_MARKUP
<div>*content*</div>

sparse:

<div>
<div class="inner">
*content*
</div>
</div>

paragraph

<style type="text/css">
    p {
        color: red;
    }
</style>

comment

<!-- html comment -->
MARKDOWN_WITH_MARKUP;

        $expectedHtml = <<<EXPECTED_HTML
<p>&lt;div&gt;<em>content</em>&lt;/div&gt;</p>
<p>sparse:</p>
<p>&lt;div&gt;
&lt;div class="inner"&gt;
<em>content</em>
&lt;/div&gt;
&lt;/div&gt;</p>
<p>paragraph</p>
<p>&lt;style type="text/css"&gt;
p {
color: red;
}
&lt;/style&gt;</p>
<p>comment</p>
<p>&lt;!-- html comment --&gt;</p>
EXPECTED_HTML;

        $SourceTextLibraryWithNoMarkup = new TestSourceTextLibrary();
        $SourceTextLibraryWithNoMarkup->setMarkupEscaped(true);
        $SourceTextLibraryWithNoMarkup->setBreaksEnabled(false);
        $this->assertEquals($expectedHtml, $SourceTextLibraryWithNoMarkup->text($markdownWithHtml));
    }

    public function testLateStaticBinding()
    {
        $SourceTextLibrary = SourceTextLibrary::instance();
        $this->assertInstanceOf('UrbanMonastics\SourceTextLibrary\SourceTextLibrary', $SourceTextLibrary);

        // After instance is already called on SourceTextLibrary
        // subsequent calls with the same arguments return the same instance
        $sameSourceTextLibrary = TestSourceTextLibrary::instance();
        $this->assertInstanceOf('UrbanMonastics\SourceTextLibrary\SourceTextLibrary', $sameSourceTextLibrary);
        $this->assertSame($SourceTextLibrary, $sameSourceTextLibrary);

        $testSourceTextLibrary = TestSourceTextLibrary::instance('test late static binding');
        $this->assertInstanceOf('TestSourceTextLibrary', $testSourceTextLibrary);

        $sameInstanceAgain = TestSourceTextLibrary::instance('test late static binding');
        $this->assertSame($testSourceTextLibrary, $sameInstanceAgain);
    }
}