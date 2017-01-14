<?php 

namespace AppBundle\Entity;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class WebSiteTest extends KernelTestCase
{
	private $em;

    protected function setUp()
    {
        self::bootKernel();

        $this->em = static::$kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

	public function testAddNewSite()
	{
		$page = new WebPage();
		$page->setName('homepage101');
		$page->setTitle('My homepage');
		$page->setBody('<body>hahahahaha</body>');
		$page->setAuthor('1');

		$this->em->persist($page);
		$this->em->flush();
		
		$homepage = $this->em->getRepository('AppBundle:WebPage')
				->find($page->getId());
		$this->assertNotNull($homepage);
		$this->assertEquals($homepage->getName(), 'homepage101');

		$this->em->remove($page);
		$this->em->flush();
		
	}

	protected function tearDown()
    {
        parent::tearDown();
        
        $this->em->close();
        $this->em = null; // avoid memory leaks
    }
}