# E-Bookshop - Online Book Marketplace & E-Learning Platform

## Overview

This is an online bookshop and e-learning platform built with PHP CodeIgniter 3.1.10. The application serves as a marketplace where users can buy and sell books, read/download e-books, and manage their orders. It includes both user-facing features (browsing, cart, orders, reviews) and an admin panel for managing the entire system (books, categories, users, order fulfillment).

## User Preferences

Preferred communication style: Simple, everyday language.

## System Architecture

### Framework & MVC Pattern
- **Framework**: CodeIgniter 3.1.10 (PHP MVC framework)
- **Pattern**: Model-View-Controller architecture
  - `application/controllers/` - Handle HTTP requests and business logic
  - `application/models/` - Database interactions and data logic
  - `application/views/` - HTML templates and UI rendering
  - `application/config/` - Configuration files (database, routes, base URL)

### Frontend Architecture
- **CSS Framework**: Bootstrap 4 for responsive layouts
- **JavaScript**: jQuery 3.2.1 (slim build), Popper.js for tooltips/popovers
- **UI Components**: 
  - Owl Carousel for image sliders
  - Froala Editor for rich text editing (e-book content, descriptions)
  - Font Awesome for icons
- **Custom Styling**: Custom fonts (Hind family) and styles in `tool/css/style.css`

### Directory Structure
- `application/` - Core application code (controllers, models, views, config)
- `system/` - CodeIgniter framework files (do not modify)
- `tool/` - Frontend assets (CSS, JS, fonts)
- Security: Each directory has an `index.html` file returning 403 Forbidden to prevent directory listing

### URL Routing
- Base URL configuration required in `application/config/config.php`
- URL rewriting via `.htaccess` with RewriteBase directive
- Project expects to be deployed under `/E-Bookshop/` path (configurable)

## External Dependencies

### Database
- **Type**: MySQL (via phpMyAdmin)
- **Database Name**: `ebookshop`
- **Schema**: Located in `tool/ebookshop.sql` (must be imported manually)
- **Driver Support**: CodeIgniter supports multiple database drivers (mysqli, mysql, pdo, postgres, sqlite, etc.)

### PHP Requirements
- PHP 5.3.7 or higher (per composer.json)
- Required PHP extensions for chosen database driver

### Frontend Libraries (CDN/Local)
- Bootstrap 4.0.0
- jQuery 3.2.1 (slim)
- Popper.js 1.12.9
- Owl Carousel 2.2.1
- Froala Editor 2.9.3 (WYSIWYG editor - requires license for commercial use)
- Font Awesome (icons)

### Development Dependencies
- PHPUnit 4.x or 5.x for testing
- vfsStream 1.1.x for filesystem testing