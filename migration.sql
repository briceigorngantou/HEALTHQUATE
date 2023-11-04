CREATE DATABASE 'healthquate' IF NOT EXISTS;

use 'healthquate';

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 04 nov. 2023 à 18:09
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
    time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Base de données : `healthquate`
--
-- --------------------------------------------------------
--
-- Structure de la table `admin`
--
DROP TABLE IF EXISTS `admin`;

CREATE TABLE IF NOT EXISTS `admin` (
    `id` int NOT NULL AUTO_INCREMENT,
    `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8mb3;

--
-- Déchargement des données de la table `admin`
--
INSERT INTO
    `admin` (`id`, `username`, `password`, `email`)
VALUES
    (
        1,
        'G16tVtG6TUBX795igUGPfndWemVaOUZEWW1YUE5qOE4wZz09',
        'qD7iSVs5ae90NbsIWKonHDdOdzBNNk43alY0SzhGeXRkcTlES0pzakIvT2ZySiszL3pEVmZjNmxjREFuNUNzdUdpSk5ncjRablhBdG1VbENKZ0NESWRTRExhaGdrN2dQ',
        'root@adfa.adf'
    );

-- --------------------------------------------------------
--
-- Structure de la table `contrat`
--
DROP TABLE IF EXISTS `contrat`;

CREATE TABLE IF NOT EXISTS `contrat` (
    `id` int NOT NULL AUTO_INCREMENT,
    `nom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    `prenom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    `poids` varchar(255) NOT NULL,
    `taille` varchar(255) NOT NULL,
    `ville` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    `zip` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
    `prix` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 27 DEFAULT CHARSET = utf8mb3;

--
-- Déchargement des données de la table `contrat`
--
INSERT INTO
    `contrat` (
        `id`,
        `nom`,
        `prenom`,
        `poids`,
        `taille`,
        `ville`,
        `zip`,
        `email`,
        `prix`
    )
VALUES
    (
        1,
        '4NFfRjaXg4LyiQGnn7TtrTd3dnRHYUtOL3VNSw==',
        'dl03iW0ZUTDt5WxMrM6QMlRocWNJZkNwelE9PQ==',
        'YjGHnuroMx6LDCHLupMbGHVJWT0=',
        'QZ3kUXr6WUC+0g6RAv6SX3pxTjFFZz09',
        'ngihMQ6zhXCCi6sws14axTYvR3g0dz09',
        'cIZcFPJB4DrYYHY82mSyzVhLSnZjR009',
        '+dTKXKKEbJs9BAiiluFy70NZOE9FMlpsK3dGTW5LQTBib3Y2QVFOK1ArNmNJUT09',
        '4ApHo/Lf9K4q6ciwWf6kbklRbTc='
    );

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;