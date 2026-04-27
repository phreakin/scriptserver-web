-- ScriptServer Web Database Schema
-- Run this file once to initialize the database.

CREATE DATABASE IF NOT EXISTS scriptserver_web
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE scriptserver_web;

-- -------------------------------------------------------
-- Articles
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS articles (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(255)     NOT NULL,
    slug        VARCHAR(255)     NOT NULL UNIQUE,
    summary     TEXT,
    body        LONGTEXT,
    cover_image VARCHAR(512),
    published   TINYINT(1)       NOT NULL DEFAULT 0,
    created_at  DATETIME         NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME         NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------------
-- Videos
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS videos (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(255)     NOT NULL,
    slug        VARCHAR(255)     NOT NULL UNIQUE,
    description TEXT,
    youtube_id  VARCHAR(64),
    thumbnail   VARCHAR(512),
    published   TINYINT(1)       NOT NULL DEFAULT 0,
    created_at  DATETIME         NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME         NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------------
-- Clips
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS clips (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(255)     NOT NULL,
    slug        VARCHAR(255)     NOT NULL UNIQUE,
    description TEXT,
    video_url   VARCHAR(512),
    thumbnail   VARCHAR(512),
    platform    VARCHAR(64)      COMMENT 'e.g. YouTube Shorts, TikTok, Instagram Reels',
    published   TINYINT(1)       NOT NULL DEFAULT 0,
    created_at  DATETIME         NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME         NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------------
-- Reposts (social media reposts of produced content)
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS reposts (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(255)     NOT NULL,
    platform    VARCHAR(64)      NOT NULL COMMENT 'e.g. Twitter/X, LinkedIn, Facebook',
    content     TEXT,
    source_url  VARCHAR(512),
    published   TINYINT(1)       NOT NULL DEFAULT 0,
    created_at  DATETIME         NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at  DATETIME         NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------------
-- Community contributed content
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS community_items (
    id             INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title          VARCHAR(255)                                           NOT NULL,
    slug           VARCHAR(255)                                           NOT NULL UNIQUE,
    type           ENUM('template','workflow','script','configuration')   NOT NULL,
    description    TEXT,
    content_url    VARCHAR(512)                                           NOT NULL,
    author_name    VARCHAR(255)                                           NOT NULL,
    author_email   VARCHAR(255),
    download_count INT UNSIGNED NOT NULL DEFAULT 0,
    vote_score     INT          NOT NULL DEFAULT 0,
    published      TINYINT(1)   NOT NULL DEFAULT 0,
    created_at     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at     DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS community_votes (
    id         INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_id    INT UNSIGNED NOT NULL,
    ip_hash    VARCHAR(64)  NOT NULL,
    vote       TINYINT      NOT NULL COMMENT '1 = upvote, -1 = downvote',
    created_at DATETIME     NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY uq_vote (item_id, ip_hash),
    FOREIGN KEY (item_id) REFERENCES community_items(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------------
-- Contact / Lead submissions
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS contact_submissions (
    id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(255)     NOT NULL,
    email       VARCHAR(255)     NOT NULL,
    subject     VARCHAR(255),
    message     TEXT             NOT NULL,
    ip_address  VARCHAR(45),
    created_at  DATETIME         NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -------------------------------------------------------
-- Sponsorship / Brand deal / Partnership inquiries
-- -------------------------------------------------------
CREATE TABLE IF NOT EXISTS partnership_inquiries (
    id           INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    inquiry_type ENUM('sponsorship','brand_deal','partnership') NOT NULL,
    company_name VARCHAR(255)     NOT NULL,
    contact_name VARCHAR(255)     NOT NULL,
    email        VARCHAR(255)     NOT NULL,
    budget       VARCHAR(64),
    message      TEXT             NOT NULL,
    ip_address   VARCHAR(45),
    created_at   DATETIME         NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
