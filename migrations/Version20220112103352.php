<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220112103352 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE link DROP INDEX IDX_36AC99F1A76ED395, ADD UNIQUE INDEX UNIQ_36AC99F1A76ED395 (user_id)');
        $this->addSql('ALTER TABLE link CHANGE linkedln linked_in VARCHAR(512) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE link DROP INDEX UNIQ_36AC99F1A76ED395, ADD INDEX IDX_36AC99F1A76ED395 (user_id)');
        $this->addSql('ALTER TABLE link CHANGE linked_in linkedln VARCHAR(512) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
