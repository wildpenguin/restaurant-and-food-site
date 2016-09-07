<?php 

namespace Tests\AppBundle\Entity;

class SiteTest extends \PHPUnit_Framework_TestCase
{
	public function testSiteLoad()
	{
		$site = new Site;
		$content = $site->load('index');
		$this->assertTrue(array_key_exists('title', $content));
		$this->assertTrue(array_key_exists('body', $content));
	}
}