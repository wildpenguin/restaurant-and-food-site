<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Create webpage table
 */
class Version20161011055908 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql("
            CREATE TABLE website_menu (
            id INT NOT NULL AUTO_INCREMENT,
            name char(50),
            title char(50),
            url char(100),
            position INT, 
            icon char(100),
            parent INT default 0,
            PRIMARY KEY(id)
            )"
        );

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('drop table website_menu');
    }
}
