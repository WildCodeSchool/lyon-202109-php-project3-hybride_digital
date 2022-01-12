<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220110111215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE link (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, linkedln VARCHAR(512) DEFAULT NULL, facebook VARCHAR(512) DEFAULT NULL, tiktok VARCHAR(512) DEFAULT NULL, twitter VARCHAR(512) DEFAULT NULL, instagram VARCHAR(512) DEFAULT NULL, snapchat VARCHAR(512) DEFAULT NULL, youtube VARCHAR(512) DEFAULT NULL, pinterest VARCHAR(512) DEFAULT NULL, site VARCHAR(512) DEFAULT NULL, INDEX IDX_36AC99F1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE link');
    }
}
