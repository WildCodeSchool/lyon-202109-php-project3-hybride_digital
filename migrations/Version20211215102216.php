<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211215102216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD firstname VARCHAR(100) NOT NULL, ADD lastname VARCHAR(100) NOT NULL, ADD companyname VARCHAR(255) DEFAULT NULL, ADD domainname VARCHAR(255) DEFAULT NULL, ADD businesssector VARCHAR(100) DEFAULT NULL, ADD phonenumber VARCHAR(20) DEFAULT NULL, ADD adress VARCHAR(255) DEFAULT NULL, ADD postcode VARCHAR(20) DEFAULT NULL, ADD city VARCHAR(255) DEFAULT NULL, ADD advertisingbudget DOUBLE PRECISION DEFAULT NULL, ADD marketarea VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP firstname, DROP lastname, DROP companyname, DROP domainname, DROP businesssector, DROP phonenumber, DROP adress, DROP postcode, DROP city, DROP advertisingbudget, DROP marketarea');
    }
}