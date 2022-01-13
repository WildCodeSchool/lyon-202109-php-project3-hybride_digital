<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220112102023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE profil_commercial (id INT AUTO_INCREMENT NOT NULL, profil_id INT DEFAULT NULL, crm_used INT NOT NULL, crm_name VARCHAR(255) DEFAULT NULL, time_of_prospec INT NOT NULL, precis_time_of_prospec VARCHAR(255) DEFAULT NULL, type_of_prospec LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', prospec_more_client INT NOT NULL, number_clos_per_month INT NOT NULL, precis_clos_per_month VARCHAR(255) DEFAULT NULL, bud_of_prosp_per_month INT NOT NULL, prcis_bud_pros_month VARCHAR(255) DEFAULT NULL, analyse_prospec TINYINT(1) NOT NULL, satisfied_of_roi TINYINT(1) NOT NULL, priority_commercial JSON NOT NULL, prcis_prio_commercial VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_4D95A850275ED078 (profil_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profil_commercial ADD CONSTRAINT FK_4D95A850275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('ALTER TABLE profil DROP crm_used, DROP crm_name, DROP time_of_prospec, DROP type_of_prospec, DROP prospec_more_client, DROP analyse_prospec, DROP satisfied_of_roi, DROP priority_commercial, DROP precis_time_of_prospec, DROP number_clos_per_month, DROP precis_clos_per_month, DROP bud_of_prosp_per_month, DROP prcis_bud_pros_month');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE profil_commercial');
        $this->addSql('ALTER TABLE profil ADD crm_used INT NOT NULL, ADD crm_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD time_of_prospec INT NOT NULL, ADD type_of_prospec LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:array)\', ADD prospec_more_client INT NOT NULL, ADD analyse_prospec TINYINT(1) NOT NULL, ADD satisfied_of_roi TINYINT(1) NOT NULL, ADD priority_commercial JSON NOT NULL, ADD precis_time_of_prospec VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD number_clos_per_month INT NOT NULL, ADD precis_clos_per_month VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD bud_of_prosp_per_month INT NOT NULL, ADD prcis_bud_pros_month VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
