<?php 

namespace AppBundle\Entity;

class WebSiteTest extends \PHPUnit_Framework_TestCase
{
	public function testNewWebsite()
	{
		$site = new WebPage();
		$site->setName('homepage');
		$site->setTitle('My homepage');
		$site->setBody('<body></body>');
		$site->setCreatedAt(date('Y-m-d H:i:s'));
		$site->setAuthor('1');

		$em = $this->getDoctrine()->getManager;
		$em->persist($site);

		$content = $site->load('homepage');
		$this->assertEqual($content->getName(), 'homepage');
		$this->assertEqual($content->getTitle(), 'My homepage');
		
	}
}