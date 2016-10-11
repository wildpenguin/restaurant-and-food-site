<?php 

namespace AppBundle\Entity;

class WebSiteTest extends \PHPUnit_Framework_TestCase
{
	public function testNewWebsite()
	{
		$page = new WebPage();
		$page->setName('homepage');
		$page->setTitle('My homepage');
		$page->setBody('<body></body>');
		$page->setCreatedAt(date('Y-m-d H:i:s'));
		$page->setAuthor('1');

		$em = $this->getDoctrine()->getManager();
		$em->persist($page);

		$content = $site->load('homepage');
		$this->assertEqual($content->getName(), 'homepage');
		$this->assertEqual($content->getTitle(), 'My homepage');
		
	}
}