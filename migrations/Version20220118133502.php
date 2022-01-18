<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220118133502 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, text LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE action_ressource (action_id INT NOT NULL, ressource_id INT NOT NULL, INDEX IDX_379956599D32F035 (action_id), INDEX IDX_37995659FC6CD52A (ressource_id), PRIMARY KEY(action_id, ressource_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE action_check (id INT AUTO_INCREMENT NOT NULL, step_check_id INT NOT NULL, action_id INT DEFAULT NULL, is_complete TINYINT(1) NOT NULL, INDEX IDX_DB4060AF40968788 (step_check_id), INDEX IDX_DB4060AF9D32F035 (action_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roadmap (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roadmap_step (roadmap_id INT NOT NULL, step_id INT NOT NULL, INDEX IDX_FA9182DC135345B2 (roadmap_id), INDEX IDX_FA9182DC73B21E9C (step_id), PRIMARY KEY(roadmap_id, step_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE roadmap_check (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, roadmap_id INT NOT NULL, is_complete TINYINT(1) NOT NULL, INDEX IDX_9C3D6617A76ED395 (user_id), INDEX IDX_9C3D6617135345B2 (roadmap_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step_action (step_id INT NOT NULL, action_id INT NOT NULL, INDEX IDX_6AD241E873B21E9C (step_id), INDEX IDX_6AD241E89D32F035 (action_id), PRIMARY KEY(step_id, action_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step_check (id INT AUTO_INCREMENT NOT NULL, roadmap_check_id INT NOT NULL, step_id INT NOT NULL, is_complete TINYINT(1) NOT NULL, INDEX IDX_20AC5BEC14E7F069 (roadmap_check_id), INDEX IDX_20AC5BEC73B21E9C (step_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action_ressource ADD CONSTRAINT FK_379956599D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE action_ressource ADD CONSTRAINT FK_37995659FC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE action_check ADD CONSTRAINT FK_DB4060AF40968788 FOREIGN KEY (step_check_id) REFERENCES step_check (id)');
        $this->addSql('ALTER TABLE action_check ADD CONSTRAINT FK_DB4060AF9D32F035 FOREIGN KEY (action_id) REFERENCES action (id)');
        $this->addSql('ALTER TABLE roadmap_step ADD CONSTRAINT FK_FA9182DC135345B2 FOREIGN KEY (roadmap_id) REFERENCES roadmap (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE roadmap_step ADD CONSTRAINT FK_FA9182DC73B21E9C FOREIGN KEY (step_id) REFERENCES step (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE roadmap_check ADD CONSTRAINT FK_9C3D6617A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE roadmap_check ADD CONSTRAINT FK_9C3D6617135345B2 FOREIGN KEY (roadmap_id) REFERENCES roadmap (id)');
        $this->addSql('ALTER TABLE step_action ADD CONSTRAINT FK_6AD241E873B21E9C FOREIGN KEY (step_id) REFERENCES step (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE step_action ADD CONSTRAINT FK_6AD241E89D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE step_check ADD CONSTRAINT FK_20AC5BEC14E7F069 FOREIGN KEY (roadmap_check_id) REFERENCES roadmap_check (id)');
        $this->addSql('ALTER TABLE step_check ADD CONSTRAINT FK_20AC5BEC73B21E9C FOREIGN KEY (step_id) REFERENCES step (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action_ressource DROP FOREIGN KEY FK_379956599D32F035');
        $this->addSql('ALTER TABLE action_check DROP FOREIGN KEY FK_DB4060AF9D32F035');
        $this->addSql('ALTER TABLE step_action DROP FOREIGN KEY FK_6AD241E89D32F035');
        $this->addSql('ALTER TABLE roadmap_step DROP FOREIGN KEY FK_FA9182DC135345B2');
        $this->addSql('ALTER TABLE roadmap_check DROP FOREIGN KEY FK_9C3D6617135345B2');
        $this->addSql('ALTER TABLE step_check DROP FOREIGN KEY FK_20AC5BEC14E7F069');
        $this->addSql('ALTER TABLE roadmap_step DROP FOREIGN KEY FK_FA9182DC73B21E9C');
        $this->addSql('ALTER TABLE step_action DROP FOREIGN KEY FK_6AD241E873B21E9C');
        $this->addSql('ALTER TABLE step_check DROP FOREIGN KEY FK_20AC5BEC73B21E9C');
        $this->addSql('ALTER TABLE action_check DROP FOREIGN KEY FK_DB4060AF40968788');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE action_ressource');
        $this->addSql('DROP TABLE action_check');
        $this->addSql('DROP TABLE roadmap');
        $this->addSql('DROP TABLE roadmap_step');
        $this->addSql('DROP TABLE roadmap_check');
        $this->addSql('DROP TABLE step');
        $this->addSql('DROP TABLE step_action');
        $this->addSql('DROP TABLE step_check');
    }
}
