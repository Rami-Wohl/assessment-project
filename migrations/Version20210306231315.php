<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210306231315 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE assessment (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(10) NOT NULL, title VARCHAR(100) NOT NULL, intro_text VARCHAR(500) NOT NULL, outro_text VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE assessment_question (id INT AUTO_INCREMENT NOT NULL, question_id_id INT NOT NULL, assessment_id_id INT NOT NULL, INDEX IDX_CA8158684FAF8F53 (question_id_id), INDEX IDX_CA8158687660A141 (assessment_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question (id INT AUTO_INCREMENT NOT NULL, body_text VARCHAR(255) NOT NULL, question_type INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE assessment_question ADD CONSTRAINT FK_CA8158684FAF8F53 FOREIGN KEY (question_id_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE assessment_question ADD CONSTRAINT FK_CA8158687660A141 FOREIGN KEY (assessment_id_id) REFERENCES assessment (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE assessment_question DROP FOREIGN KEY FK_CA8158687660A141');
        $this->addSql('ALTER TABLE assessment_question DROP FOREIGN KEY FK_CA8158684FAF8F53');
        $this->addSql('DROP TABLE assessment');
        $this->addSql('DROP TABLE assessment_question');
        $this->addSql('DROP TABLE question');
    }
}
