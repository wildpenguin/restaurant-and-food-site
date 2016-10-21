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
		$page->setName('homepage');
		$page->setTitle('My homepage');
		$page->setBody('<body>hahahahaha</body>');
		$page->setCreatedAt(date('Y-m-d H:i:s'));
		$page->setAuthor('1');

		
		$this->em->persist($page);

		$content = $page->load('homepage');
		$this->assertEqual($content->getName(), 'homepage');
		$this->assertEqual($content->getTitle(), 'My homepage');
		
	}

	protected function tearDown()
    {
        parent::tearDown();

        $connection = $this->em->getConnection();
        
        $connection->query('SET FOREIGN_KEY_CHECKS=0');
        $connection->query('DELETE from webpage');
 		$connection->commit();

        $this->em->close();
        $this->em = null; // avoid memory leaks
    }
}