<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211220150409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE audit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, datecreation DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE audit_question (audit_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_E6E31AA7BD29F359 (audit_id), INDEX IDX_E6E31AA71E27F6BF (question_id), PRIMARY KEY(audit_id, question_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE audit_question ADD CONSTRAINT FK_E6E31AA7BD29F359 FOREIGN KEY (audit_id) REFERENCES audit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE audit_question ADD CONSTRAINT FK_E6E31AA71E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE audit_question DROP FOREIGN KEY FK_E6E31AA7BD29F359');
        $this->addSql('DROP TABLE audit');
        $this->addSql('DROP TABLE audit_question');
    }
}