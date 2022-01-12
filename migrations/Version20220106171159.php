<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220106171159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('CREATE TABLE action (id INT AUTO_INCREMENT NOT NULL, subject VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE action_ressource (action_id INT NOT NULL, ressource_id INT NOT NULL, INDEX IDX_379956599D32F035 (action_id), INDEX IDX_37995659FC6CD52A (ressource_id), PRIMARY KEY(action_id, ressource_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        //$this->addSql('CREATE TABLE ressource (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, link VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action_ressource ADD CONSTRAINT FK_379956599D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE action_ressource ADD CONSTRAINT FK_37995659FC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE profil ADD precis_time_of_prospec VARCHAR(255) DEFAULT NULL, ADD number_clos_per_month INT NOT NULL, ADD precis_clos_per_month VARCHAR(255) DEFAULT NULL, ADD bud_of_prosp_per_month INT NOT NULL, ADD prcis_bud_pros_month VARCHAR(255) DEFAULT NULL, DROP precision_time_of_prospec, DROP number_closing_per_month, DROP precision_closing_per_month, DROP budget_of_prospec_per_month, DROP precision_budget_of_prospec_per_month');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE action_ressource DROP FOREIGN KEY FK_379956599D32F035');
        $this->addSql('ALTER TABLE action_ressource DROP FOREIGN KEY FK_37995659FC6CD52A');
        $this->addSql('DROP TABLE action');
        $this->addSql('DROP TABLE action_ressource');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('ALTER TABLE profil ADD precision_time_of_prospec VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD number_closing_per_month INT NOT NULL, ADD precision_closing_per_month VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD budget_of_prospec_per_month INT NOT NULL, ADD precision_budget_of_prospec_per_month VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP precis_time_of_prospec, DROP number_clos_per_month, DROP precis_clos_per_month, DROP bud_of_prosp_per_month, DROP prcis_bud_pros_month');
    }
}
