<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210816105645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE arbitro (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cambio (id INT AUTO_INCREMENT NOT NULL, partido_id INT NOT NULL, jugador_id INT NOT NULL, minuto INT NOT NULL, tipo INT NOT NULL, INDEX IDX_70DD1E1D11856EB4 (partido_id), INDEX IDX_70DD1E1DB8A54D43 (jugador_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gol (id INT AUTO_INCREMENT NOT NULL, partido_id INT NOT NULL, jugador_id INT NOT NULL, minuto INT NOT NULL, penalti TINYINT(1) NOT NULL, propia_meta TINYINT(1) NOT NULL, INDEX IDX_14B85EAC11856EB4 (partido_id), INDEX IDX_14B85EACB8A54D43 (jugador_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jornada (id INT AUTO_INCREMENT NOT NULL, competicion_id INT NOT NULL, numero INT NOT NULL, fecha_inicio DATE NOT NULL, fecha_fin DATE NOT NULL, INDEX IDX_61D21CBFD9407152 (competicion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jugador (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, apodo VARCHAR(255) NOT NULL, fecha_nacimiento DATE NOT NULL, nacionalidad VARCHAR(255) NOT NULL, pais_nacimiento VARCHAR(255) DEFAULT NULL, posicion VARCHAR(3) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE partido (id INT AUTO_INCREMENT NOT NULL, equipo_local_id INT NOT NULL, equipo_visitante_id INT NOT NULL, arbitro_id INT NOT NULL, jornada_id INT NOT NULL, goles_local INT NOT NULL, goles_visitante INT NOT NULL, fecha DATETIME NOT NULL, disputado TINYINT(1) NOT NULL, INDEX IDX_4E79750B88774E73 (equipo_local_id), INDEX IDX_4E79750B8C243011 (equipo_visitante_id), INDEX IDX_4E79750B66FE4594 (arbitro_id), INDEX IDX_4E79750B26E992D9 (jornada_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tarjeta (id INT AUTO_INCREMENT NOT NULL, partido_id INT NOT NULL, jugador_id INT NOT NULL, minuto INT NOT NULL, tipo INT NOT NULL, INDEX IDX_AE90B78611856EB4 (partido_id), INDEX IDX_AE90B786B8A54D43 (jugador_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cambio ADD CONSTRAINT FK_70DD1E1D11856EB4 FOREIGN KEY (partido_id) REFERENCES partido (id)');
        $this->addSql('ALTER TABLE cambio ADD CONSTRAINT FK_70DD1E1DB8A54D43 FOREIGN KEY (jugador_id) REFERENCES jugador (id)');
        $this->addSql('ALTER TABLE gol ADD CONSTRAINT FK_14B85EAC11856EB4 FOREIGN KEY (partido_id) REFERENCES partido (id)');
        $this->addSql('ALTER TABLE gol ADD CONSTRAINT FK_14B85EACB8A54D43 FOREIGN KEY (jugador_id) REFERENCES jugador (id)');
        $this->addSql('ALTER TABLE jornada ADD CONSTRAINT FK_61D21CBFD9407152 FOREIGN KEY (competicion_id) REFERENCES competicion (id)');
        $this->addSql('ALTER TABLE partido ADD CONSTRAINT FK_4E79750B88774E73 FOREIGN KEY (equipo_local_id) REFERENCES equipo (id)');
        $this->addSql('ALTER TABLE partido ADD CONSTRAINT FK_4E79750B8C243011 FOREIGN KEY (equipo_visitante_id) REFERENCES equipo (id)');
        $this->addSql('ALTER TABLE partido ADD CONSTRAINT FK_4E79750B66FE4594 FOREIGN KEY (arbitro_id) REFERENCES arbitro (id)');
        $this->addSql('ALTER TABLE partido ADD CONSTRAINT FK_4E79750B26E992D9 FOREIGN KEY (jornada_id) REFERENCES jornada (id)');
        $this->addSql('ALTER TABLE tarjeta ADD CONSTRAINT FK_AE90B78611856EB4 FOREIGN KEY (partido_id) REFERENCES partido (id)');
        $this->addSql('ALTER TABLE tarjeta ADD CONSTRAINT FK_AE90B786B8A54D43 FOREIGN KEY (jugador_id) REFERENCES jugador (id)');
        $this->addSql('ALTER TABLE equipo ADD partido_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipo ADD CONSTRAINT FK_C49C530B11856EB4 FOREIGN KEY (partido_id) REFERENCES partido (id)');
        $this->addSql('CREATE INDEX IDX_C49C530B11856EB4 ON equipo (partido_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partido DROP FOREIGN KEY FK_4E79750B66FE4594');
        $this->addSql('ALTER TABLE partido DROP FOREIGN KEY FK_4E79750B26E992D9');
        $this->addSql('ALTER TABLE cambio DROP FOREIGN KEY FK_70DD1E1DB8A54D43');
        $this->addSql('ALTER TABLE gol DROP FOREIGN KEY FK_14B85EACB8A54D43');
        $this->addSql('ALTER TABLE tarjeta DROP FOREIGN KEY FK_AE90B786B8A54D43');
        $this->addSql('ALTER TABLE cambio DROP FOREIGN KEY FK_70DD1E1D11856EB4');
        $this->addSql('ALTER TABLE equipo DROP FOREIGN KEY FK_C49C530B11856EB4');
        $this->addSql('ALTER TABLE gol DROP FOREIGN KEY FK_14B85EAC11856EB4');
        $this->addSql('ALTER TABLE tarjeta DROP FOREIGN KEY FK_AE90B78611856EB4');
        $this->addSql('DROP TABLE arbitro');
        $this->addSql('DROP TABLE cambio');
        $this->addSql('DROP TABLE gol');
        $this->addSql('DROP TABLE jornada');
        $this->addSql('DROP TABLE jugador');
        $this->addSql('DROP TABLE partido');
        $this->addSql('DROP TABLE tarjeta');
        $this->addSql('DROP INDEX IDX_C49C530B11856EB4 ON equipo');
        $this->addSql('ALTER TABLE equipo DROP partido_id');
    }
}
