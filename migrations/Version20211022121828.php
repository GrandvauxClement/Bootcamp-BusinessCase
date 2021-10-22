<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211022121828 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dispo_ouverture (id INT AUTO_INCREMENT NOT NULL, nom_jour VARCHAR(20) NOT NULL, service_midi TINYINT(1) NOT NULL, service_soir TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dispo_ouverture_etablissement (dispo_ouverture_id INT NOT NULL, etablissement_id INT NOT NULL, INDEX IDX_C88BE1C31E2D6DF3 (dispo_ouverture_id), INDEX IDX_C88BE1C3FF631228 (etablissement_id), PRIMARY KEY(dispo_ouverture_id, etablissement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissement (id INT AUTO_INCREMENT NOT NULL, id_type_cuisine_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, rue VARCHAR(255) NOT NULL, code_postal VARCHAR(6) NOT NULL, ville VARCHAR(255) NOT NULL, nbre_place_total INT NOT NULL, accepte_reservation TINYINT(1) NOT NULL, service_midi_debut_time TIME DEFAULT NULL, service_midi_fin_time TIME DEFAULT NULL, service_soir_debut_time TIME DEFAULT NULL, service_soir_fin_time TIME DEFAULT NULL, INDEX IDX_20FD592C1916B9B9 (id_type_cuisine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissement_tags (etablissement_id INT NOT NULL, tags_id INT NOT NULL, INDEX IDX_A835A231FF631228 (etablissement_id), INDEX IDX_A835A2318D7B4FB4 (tags_id), PRIMARY KEY(etablissement_id, tags_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat_reservation (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images_restaurants (id INT AUTO_INCREMENT NOT NULL, id_etablissement_id INT NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_D0354FB81CE947F9 (id_etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, id_etablissement_id INT NOT NULL, id_etat_reservation_id INT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, num_tel VARCHAR(15) NOT NULL, heure_arrive TIME NOT NULL, nbre_place INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_42C849551CE947F9 (id_etablissement_id), INDEX IDX_42C8495547A8AB30 (id_etat_reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_cuisine (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dispo_ouverture_etablissement ADD CONSTRAINT FK_C88BE1C31E2D6DF3 FOREIGN KEY (dispo_ouverture_id) REFERENCES dispo_ouverture (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dispo_ouverture_etablissement ADD CONSTRAINT FK_C88BE1C3FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etablissement ADD CONSTRAINT FK_20FD592C1916B9B9 FOREIGN KEY (id_type_cuisine_id) REFERENCES type_cuisine (id)');
        $this->addSql('ALTER TABLE etablissement_tags ADD CONSTRAINT FK_A835A231FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etablissement_tags ADD CONSTRAINT FK_A835A2318D7B4FB4 FOREIGN KEY (tags_id) REFERENCES tags (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE images_restaurants ADD CONSTRAINT FK_D0354FB81CE947F9 FOREIGN KEY (id_etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849551CE947F9 FOREIGN KEY (id_etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495547A8AB30 FOREIGN KEY (id_etat_reservation_id) REFERENCES etat_reservation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dispo_ouverture_etablissement DROP FOREIGN KEY FK_C88BE1C31E2D6DF3');
        $this->addSql('ALTER TABLE dispo_ouverture_etablissement DROP FOREIGN KEY FK_C88BE1C3FF631228');
        $this->addSql('ALTER TABLE etablissement_tags DROP FOREIGN KEY FK_A835A231FF631228');
        $this->addSql('ALTER TABLE images_restaurants DROP FOREIGN KEY FK_D0354FB81CE947F9');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849551CE947F9');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495547A8AB30');
        $this->addSql('ALTER TABLE etablissement_tags DROP FOREIGN KEY FK_A835A2318D7B4FB4');
        $this->addSql('ALTER TABLE etablissement DROP FOREIGN KEY FK_20FD592C1916B9B9');
        $this->addSql('DROP TABLE dispo_ouverture');
        $this->addSql('DROP TABLE dispo_ouverture_etablissement');
        $this->addSql('DROP TABLE etablissement');
        $this->addSql('DROP TABLE etablissement_tags');
        $this->addSql('DROP TABLE etat_reservation');
        $this->addSql('DROP TABLE images_restaurants');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE tags');
        $this->addSql('DROP TABLE type_cuisine');
    }
}
