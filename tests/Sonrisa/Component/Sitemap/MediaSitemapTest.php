<?php
/*
 * Author: Nil Portugués Calderó <contact@nilportugues.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Class MediaSitemapTest
 */
class MediaSitemapTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->sitemap = new \Sonrisa\Component\Sitemap\MediaSitemap();
    }


    public function testValidMediaSitemapWillAllFields()
    {
        $expected=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
<channel>
\t<title>Media RSS de ejemplo</title>
\t<link>http://www.example.com/ejemplos/mrss/</link>
\t<description>Ejemplo de MRSS</description>
\t<item xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
\t\t<link>http://www.example.com/examples/mrss/example.html</link>
\t\t<media:content type="video/x-flv" duration="120">
\t\t\t<media:player url="http://www.example.com/shows/example/video.swf?flash_params" />
\t\t\t<media:title>Barbacoas en verano</media:title>
\t\t\t<media:description>Consigue que los filetes queden perfectamente hechos siempre</media:description>
\t\t\t<media:thumbnail url="http://www.example.com/examples/mrss/example.png" height="120" width="160"/>
\t\t</media:content>
\t</item>
</channel>
</rss>
XML;
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setLink('http://www.example.com/ejemplos/mrss/');
        $this->sitemap->setDescription('Ejemplo de MRSS');
        $this->sitemap->add(array
        (
            'link'          => 'http://www.example.com/examples/mrss/example.html',
            'mimetype'      =>  'video/x-flv',
            'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
            'duration'      =>  120,
            'title'         =>  'Barbacoas en verano',
            'description'   =>  'Consigue que los filetes queden perfectamente hechos siempre',
            'thumbnail'     =>  'http://www.example.com/examples/mrss/example.png',
            'height'        =>  120,
            'width'         =>  160,
        ));


        $files = $this->sitemap->build();
        $this->assertEquals($expected,$files[0]);
    }

    public function testValidMediaSitemapWillAllFieldsExceptChannelTitle()
    {
        $expected=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
<channel>
\t<title>Media RSS de ejemplo</title>
\t<description>Ejemplo de MRSS</description>
\t<item xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
\t\t<link>http://www.example.com/examples/mrss/example.html</link>
\t\t<media:content type="video/x-flv" duration="120">
\t\t\t<media:player url="http://www.example.com/shows/example/video.swf?flash_params" />
\t\t\t<media:title>Barbacoas en verano</media:title>
\t\t\t<media:description>Consigue que los filetes queden perfectamente hechos siempre</media:description>
\t\t\t<media:thumbnail url="http://www.example.com/examples/mrss/example.png" height="120" width="160"/>
\t\t</media:content>
\t</item>
</channel>
</rss>
XML;
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setDescription('Ejemplo de MRSS');
        $this->sitemap->add(array
        (
            'link'          => 'http://www.example.com/examples/mrss/example.html',
            'mimetype'      =>  'video/x-flv',
            'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
            'duration'      =>  120,
            'title'         =>  'Barbacoas en verano',
            'description'   =>  'Consigue que los filetes queden perfectamente hechos siempre',
            'thumbnail'     =>  'http://www.example.com/examples/mrss/example.png',
            'height'        =>  120,
            'width'         =>  160,
        ));


        $files = $this->sitemap->build();
        $this->assertEquals($expected,$files[0]);
    }

    public function testValidMediaSitemapWillAllFieldsExceptChannelLink()
    {

        $expected=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
<channel>
\t<title>Media RSS de ejemplo</title>
\t<description>Ejemplo de MRSS</description>
\t<item xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
\t\t<link>http://www.example.com/examples/mrss/example.html</link>
\t\t<media:content type="video/x-flv" duration="120">
\t\t\t<media:player url="http://www.example.com/shows/example/video.swf?flash_params" />
\t\t\t<media:title>Barbacoas en verano</media:title>
\t\t\t<media:description>Consigue que los filetes queden perfectamente hechos siempre</media:description>
\t\t\t<media:thumbnail url="http://www.example.com/examples/mrss/example.png" height="120" width="160"/>
\t\t</media:content>
\t</item>
</channel>
</rss>
XML;
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setDescription('Ejemplo de MRSS');
        $this->sitemap->add(array
        (
            'link'          => 'http://www.example.com/examples/mrss/example.html',
            'mimetype'      =>  'video/x-flv',
            'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
            'duration'      =>  120,
            'title'         =>  'Barbacoas en verano',
            'description'   =>  'Consigue que los filetes queden perfectamente hechos siempre',
            'thumbnail'     =>  'http://www.example.com/examples/mrss/example.png',
            'height'        =>  120,
            'width'         =>  160,
        ));


        $files = $this->sitemap->build();
        $this->assertEquals($expected,$files[0]);

    }

    public function testValidMediaSitemapWillAllFieldsAndChannelLinkInvalid()
    {
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setDescription('Ejemplo de MRSS');
        $this->sitemap->add(array
        (
            'link'          =>  'not/a/valid/URL',
            'mimetype'      =>  'video/x-flv',
            'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
            'duration'      =>  120,
            'title'         =>  'Barbacoas en verano',
            'description'   =>  'Consigue que los filetes queden perfectamente hechos siempre',
            'thumbnail'     =>  'http://www.example.com/examples/mrss/example.png',
            'height'        =>  120,
            'width'         =>  160,
        ));

        $files = $this->sitemap->build();
        $this->assertEmpty($files);
    }

    public function testValidMediaSitemapWillAllFieldsExceptChannelDescription()
    {
        $expected=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
<channel>
\t<title>Media RSS de ejemplo</title>
\t<link>http://www.example.com/ejemplos/mrss/</link>
\t<item xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
\t\t<link>http://www.example.com/examples/mrss/example.html</link>
\t\t<media:content type="video/x-flv" duration="120">
\t\t\t<media:player url="http://www.example.com/shows/example/video.swf?flash_params" />
\t\t\t<media:title>Barbacoas en verano</media:title>
\t\t\t<media:description>Consigue que los filetes queden perfectamente hechos siempre</media:description>
\t\t\t<media:thumbnail url="http://www.example.com/examples/mrss/example.png" height="120" width="160"/>
\t\t</media:content>
\t</item>
</channel>
</rss>
XML;
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setLink('http://www.example.com/ejemplos/mrss/');
        $this->sitemap->add(array
        (
            'link'          => 'http://www.example.com/examples/mrss/example.html',
            'mimetype'      =>  'video/x-flv',
            'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
            'duration'      =>  120,
            'title'         =>  'Barbacoas en verano',
            'description'   =>  'Consigue que los filetes queden perfectamente hechos siempre',
            'thumbnail'     =>  'http://www.example.com/examples/mrss/example.png',
            'height'        =>  120,
            'width'         =>  160,
        ));


        $files = $this->sitemap->build();
        $this->assertEquals($expected,$files[0]);
    }



    public function testValidMediaSitemapWillAllFieldsExceptItemMimetype()
    {
        $expected=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
<channel>
\t<title>Media RSS de ejemplo</title>
\t<link>http://www.example.com/ejemplos/mrss/</link>
\t<item xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
\t\t<link>http://www.example.com/examples/mrss/example.html</link>
\t\t<media:content duration="120">
\t\t\t<media:player url="http://www.example.com/shows/example/video.swf?flash_params" />
\t\t\t<media:title>Barbacoas en verano</media:title>
\t\t\t<media:description>Consigue que los filetes queden perfectamente hechos siempre</media:description>
\t\t\t<media:thumbnail url="http://www.example.com/examples/mrss/example.png" height="120" width="160"/>
\t\t</media:content>
\t</item>
</channel>
</rss>
XML;
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setLink('http://www.example.com/ejemplos/mrss/');
        $this->sitemap->add(array
        (
            'link'          => 'http://www.example.com/examples/mrss/example.html',
            'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
            'duration'      =>  120,
            'title'         =>  'Barbacoas en verano',
            'description'   =>  'Consigue que los filetes queden perfectamente hechos siempre',
            'thumbnail'     =>  'http://www.example.com/examples/mrss/example.png',
            'height'        =>  120,
            'width'         =>  160,
        ));


        $files = $this->sitemap->build();
        $this->assertEquals($expected,$files[0]);
    }


    public function testValidMediaSitemapWillAllFieldsExceptItemPlayer()
    {
        $expected=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
<channel>
\t<title>Media RSS de ejemplo</title>
\t<link>http://www.example.com/ejemplos/mrss/</link>
\t<item xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
\t\t<link>http://www.example.com/examples/mrss/example.html</link>
\t\t<media:content type="video/x-flv" duration="120">
\t\t\t<media:title>Barbacoas en verano</media:title>
\t\t\t<media:description>Consigue que los filetes queden perfectamente hechos siempre</media:description>
\t\t\t<media:thumbnail url="http://www.example.com/examples/mrss/example.png" height="120" width="160"/>
\t\t</media:content>
\t</item>
</channel>
</rss>
XML;
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setLink('http://www.example.com/ejemplos/mrss/');

        $this->sitemap->add(array
        (
            'link'          => 'http://www.example.com/examples/mrss/example.html',
            'mimetype'      =>  'video/x-flv',
            'duration'      =>  120,
            'title'         =>  'Barbacoas en verano',
            'description'   =>  'Consigue que los filetes queden perfectamente hechos siempre',
            'thumbnail'     =>  'http://www.example.com/examples/mrss/example.png',
            'height'        =>  120,
            'width'         =>  160,
        ));


        $files = $this->sitemap->build();
        $this->assertEquals($expected,$files[0]);
    }

    public function testValidMediaSitemapWillAllFieldsExceptItemDuration()
    {
        $expected=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
<channel>
\t<title>Media RSS de ejemplo</title>
\t<link>http://www.example.com/ejemplos/mrss/</link>
\t<item xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
\t\t<link>http://www.example.com/examples/mrss/example.html</link>
\t\t<media:content type="video/x-flv">
\t\t\t<media:player url="http://www.example.com/shows/example/video.swf?flash_params" />
\t\t\t<media:title>Barbacoas en verano</media:title>
\t\t\t<media:description>Consigue que los filetes queden perfectamente hechos siempre</media:description>
\t\t\t<media:thumbnail url="http://www.example.com/examples/mrss/example.png" height="120" width="160"/>
\t\t</media:content>
\t</item>
</channel>
</rss>
XML;
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setLink('http://www.example.com/ejemplos/mrss/');
        $this->sitemap->add(array
        (
            'link'          => 'http://www.example.com/examples/mrss/example.html',
            'mimetype'      =>  'video/x-flv',
            'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
            'title'         =>  'Barbacoas en verano',
            'description'   =>  'Consigue que los filetes queden perfectamente hechos siempre',
            'thumbnail'     =>  'http://www.example.com/examples/mrss/example.png',
            'height'        =>  120,
            'width'         =>  160,
        ));


        $files = $this->sitemap->build();
        $this->assertEquals($expected,$files[0]);
    }

    public function testValidMediaSitemapWillAllFieldsExceptItemTitle()
    {
        $expected=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
<channel>
\t<title>Media RSS de ejemplo</title>
\t<link>http://www.example.com/ejemplos/mrss/</link>
\t<item xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
\t\t<link>http://www.example.com/examples/mrss/example.html</link>
\t\t<media:content type="video/x-flv" duration="120">
\t\t\t<media:player url="http://www.example.com/shows/example/video.swf?flash_params" />
\t\t\t<media:description>Consigue que los filetes queden perfectamente hechos siempre</media:description>
\t\t\t<media:thumbnail url="http://www.example.com/examples/mrss/example.png" height="120" width="160"/>
\t\t</media:content>
\t</item>
</channel>
</rss>
XML;
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setLink('http://www.example.com/ejemplos/mrss/');

        $this->sitemap->add(array
        (
            'link'          => 'http://www.example.com/examples/mrss/example.html',
            'mimetype'      =>  'video/x-flv',
            'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
            'duration'      =>  120,
            'description'   =>  'Consigue que los filetes queden perfectamente hechos siempre',
            'thumbnail'     =>  'http://www.example.com/examples/mrss/example.png',
            'height'        =>  120,
            'width'         =>  160,
        ));


        $files = $this->sitemap->build();
        $this->assertEquals($expected,$files[0]);
    }


    public function testValidMediaSitemapWillAllFieldsExceptItemDescription()
    {
        $expected=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
<channel>
\t<title>Media RSS de ejemplo</title>
\t<link>http://www.example.com/ejemplos/mrss/</link>
\t<item xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
\t\t<link>http://www.example.com/examples/mrss/example.html</link>
\t\t<media:content type="video/x-flv" duration="120">
\t\t\t<media:player url="http://www.example.com/shows/example/video.swf?flash_params" />
\t\t\t<media:title>Barbacoas en verano</media:title>
\t\t\t<media:thumbnail url="http://www.example.com/examples/mrss/example.png" height="120" width="160"/>
\t\t</media:content>
\t</item>
</channel>
</rss>
XML;
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setLink('http://www.example.com/ejemplos/mrss/');
        $this->sitemap->add(array
        (
            'link'          => 'http://www.example.com/examples/mrss/example.html',
            'mimetype'      =>  'video/x-flv',
            'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
            'duration'      =>  120,
            'title'         =>  'Barbacoas en verano',
            'thumbnail'     =>  'http://www.example.com/examples/mrss/example.png',
            'height'        =>  120,
            'width'         =>  160,
        ));


        $files = $this->sitemap->build();
        $this->assertEquals($expected,$files[0]);
    }


    public function testValidMediaSitemapWillAllFieldsExceptItemHeightAndWidth()
    {
        $expected=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
<channel>
\t<title>Media RSS de ejemplo</title>
\t<link>http://www.example.com/ejemplos/mrss/</link>
\t<item xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
\t\t<link>http://www.example.com/examples/mrss/example.html</link>
\t\t<media:content type="video/x-flv" duration="120">
\t\t\t<media:player url="http://www.example.com/shows/example/video.swf?flash_params" />
\t\t\t<media:title>Barbacoas en verano</media:title>
\t\t\t<media:thumbnail url="http://www.example.com/examples/mrss/example.png"/>
\t\t</media:content>
\t</item>
</channel>
</rss>
XML;
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setLink('http://www.example.com/ejemplos/mrss/');
        $this->sitemap->add(array
        (
            'link'          => 'http://www.example.com/examples/mrss/example.html',
            'mimetype'      =>  'video/x-flv',
            'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
            'duration'      =>  120,
            'title'         =>  'Barbacoas en verano',
            'thumbnail'     =>  'http://www.example.com/examples/mrss/example.png'
        ));


        $files = $this->sitemap->build();
        $this->assertEquals($expected,$files[0]);
    }

    public function testValidMediaSitemapWillAllFieldsExceptItemThumbnail()
    {
        $expected=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
<channel>
\t<title>Media RSS de ejemplo</title>
\t<link>http://www.example.com/ejemplos/mrss/</link>
\t<item xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
\t\t<link>http://www.example.com/examples/mrss/example.html</link>
\t\t<media:content type="video/x-flv" duration="120">
\t\t\t<media:player url="http://www.example.com/shows/example/video.swf?flash_params" />
\t\t\t<media:title>Barbacoas en verano</media:title>
\t\t\t<media:description>Consigue que los filetes queden perfectamente hechos siempre</media:description>
\t\t</media:content>
\t</item>
</channel>
</rss>
XML;
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setLink('http://www.example.com/ejemplos/mrss/');
        $this->sitemap->add(array
        (
            'link'          =>  'http://www.example.com/examples/mrss/example.html',
            'mimetype'      =>  'video/x-flv',
            'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
            'duration'      =>  120,
            'title'         =>  'Barbacoas en verano',
            'description'   =>  'Consigue que los filetes queden perfectamente hechos siempre',
            'height'        =>  120,
            'width'         =>  160,
        ));


        $files = $this->sitemap->build();
        $this->assertEquals($expected,$files[0]);
    }

    public function testValidMediaSitemapWillAllFieldsExceptItemThumbnailHeight()
    {
        $expected=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
<channel>
\t<title>Media RSS de ejemplo</title>
\t<link>http://www.example.com/ejemplos/mrss/</link>
\t<item xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
\t\t<link>http://www.example.com/examples/mrss/example.html</link>
\t\t<media:content type="video/x-flv" duration="120">
\t\t\t<media:player url="http://www.example.com/shows/example/video.swf?flash_params" />
\t\t\t<media:title>Barbacoas en verano</media:title>
\t\t\t<media:description>Consigue que los filetes queden perfectamente hechos siempre</media:description>
\t\t\t<media:thumbnail url="http://www.example.com/examples/mrss/example.png" width="160"/>
\t\t</media:content>
\t</item>
</channel>
</rss>
XML;
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setLink('http://www.example.com/ejemplos/mrss/');

        $this->sitemap->add(array
        (
            'link'          =>  'http://www.example.com/examples/mrss/example.html',
            'mimetype'      =>  'video/x-flv',
            'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
            'duration'      =>  120,
            'title'         =>  'Barbacoas en verano',
            'description'   =>  'Consigue que los filetes queden perfectamente hechos siempre',
            'thumbnail'     =>  'http://www.example.com/examples/mrss/example.png',
            'width'         =>  160,
        ));


        $files = $this->sitemap->build();
        $this->assertEquals($expected,$files[0]);
    }

    public function testValidMediaSitemapWillAllFieldsExceptItemThumbnailWidth()
    {
        $expected=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
<channel>
\t<title>Media RSS de ejemplo</title>
\t<link>http://www.example.com/ejemplos/mrss/</link>
\t<item xmlns:media="http://search.yahoo.com/mrss/" xmlns:dcterms="http://purl.org/dc/terms/">
\t\t<link>http://www.example.com/examples/mrss/example.html</link>
\t\t<media:content type="video/x-flv" duration="120">
\t\t\t<media:player url="http://www.example.com/shows/example/video.swf?flash_params" />
\t\t\t<media:title>Barbacoas en verano</media:title>
\t\t\t<media:description>Consigue que los filetes queden perfectamente hechos siempre</media:description>
\t\t\t<media:thumbnail url="http://www.example.com/examples/mrss/example.png" height="120"/>
\t\t</media:content>
\t</item>
</channel>
</rss>
XML;
        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setLink('http://www.example.com/ejemplos/mrss/');
        $this->sitemap->add(array
        (
            'link'          =>  'http://www.example.com/examples/mrss/example.html',
            'mimetype'      =>  'video/x-flv',
            'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
            'duration'      =>  120,
            'title'         =>  'Barbacoas en verano',
            'description'   =>  'Consigue que los filetes queden perfectamente hechos siempre',
            'thumbnail'     =>  'http://www.example.com/examples/mrss/example.png',
            'height'        =>  120,
        ));


        $files = $this->sitemap->build();
        $this->assertEquals($expected,$files[0]);
    }

    public function testAddUrlAbovetheSitemapMaxUrlElementLimit()
    {
        //For testing purposes reduce the real limit to 1000 instead of 50000
        $reflectionClass = new \ReflectionClass('Sonrisa\\Component\\Sitemap\\MediaSitemap');
        $property = $reflectionClass->getProperty('max_items_per_sitemap');
        $property->setAccessible(true);
        $property->setValue($this->sitemap,'1000');


        $this->sitemap->setTitle('Media RSS de ejemplo');
        $this->sitemap->setLink('http://www.example.com/ejemplos/mrss/');
        $this->sitemap->setDescription('Ejemplo de MRSS');


        //Test limit
        for ($i=1;$i<=2000; $i++) {
            $this->sitemap->add(array
            (
                'link'          => 'http://www.example.com/examples/mrss/example-'.$i.'.html',
                'mimetype'      =>  'video/x-flv',
                'player'        =>  'http://www.example.com/shows/example/video.swf?flash_params',
                'duration'      =>  120,
                'title'         =>  'Barbacoas en verano',
                'description'   =>  'Description '.$i,
                'thumbnail'     =>  'http://www.example.com/examples/mrss/example-'.$i.'.png',
                'height'        =>  120,
                'width'         =>  160,
            ));
        }
        $files = $this->sitemap->build();

        $this->assertArrayHasKey('0',$files);
        $this->assertArrayHasKey('1',$files);
    }
}