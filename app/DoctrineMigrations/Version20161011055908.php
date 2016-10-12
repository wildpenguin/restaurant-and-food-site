<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20161011055908 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql("CREATE TABLE webpage (
            id int not null auto_increment,
            name varchar(100),
            author_id int not null,
            created_at datetime,
            title varchar(256),
            body blob,
            tags varchar(256),
            primary key(id)
            )"
        );

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('drop table webpage');
    }
}
