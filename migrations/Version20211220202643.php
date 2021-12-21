<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211220202643 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, subject VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE action_ressource (action_id INT NOT NULL, ressource_id INT NOT NULL, INDEX IDX_379956599D32F035 (action_id), INDEX IDX_37995659FC6CD52A (ressource_id), PRIMARY KEY(action_id, ressource_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action_ressource ADD CONSTRAINT FK_379956599D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE action_ressource ADD CONSTRAINT FK_37995659FC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action_ressource DROP FOREIGN KEY FK_379956599D32F035');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE action_ressource');
    }
}
