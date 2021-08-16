<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210815111806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE competicion (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entrenador (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, nacionalidad VARCHAR(255) NOT NULL, fecha_nacimiento DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipo (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, club VARCHAR(255) NOT NULL, fundacion INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE estadio (id INT AUTO_INCREMENT NOT NULL, equipo_id INT NOT NULL, nombre VARCHAR(255) NOT NULL, capacidad INT NOT NULL, construccion INT NOT NULL, dimensiones VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_6070DAE123BFBED (equipo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE temporada (id_competicion INT NOT NULL, id_equipo INT NOT NULL, id_jugador INT NOT NULL, PRIMARY KEY(id_competicion, id_equipo, id_jugador)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE estadio ADD CONSTRAINT FK_6070DAE123BFBED FOREIGN KEY (equipo_id) REFERENCES equipo (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE estadio DROP FOREIGN KEY FK_6070DAE123BFBED');
        $this->addSql('DROP TABLE competicion');
        $this->addSql('DROP TABLE entrenador');
        $this->addSql('DROP TABLE equipo');
        $this->addSql('DROP TABLE estadio');
        $this->addSql('DROP TABLE temporada');
    }
}
