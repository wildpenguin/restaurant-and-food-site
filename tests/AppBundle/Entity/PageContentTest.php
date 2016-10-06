<?php 

namespace AppBundle\Entity;

class PageContentTest extends \PHPUnit_Framework_TestCase
{
	public function testSiteLoad()
	{
		$site = new PageContent;
		$content = $site->load('index');
		$this->assertTrue(array_key_exists('title', $content));
		$this->assertTrue(array_key_exists('body', $content));
	}
}