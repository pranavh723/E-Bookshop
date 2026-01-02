# Hamsafar Book Center - Online Book Marketplace & E-Learning Platform

[![Deploy to Render](https://render.com/images/deploy-to-render-button.svg)](https://render.com/deploy)

## Overview

This is an online bookshop and e-learning platform built with PHP CodeIgniter 3.1.10. The application serves as a marketplace where users can buy and sell books, read/download e-books, and manage their orders. It includes both user-facing features (browsing, cart, orders, reviews) and an admin panel for managing the entire system (books, categories, users, order fulfillment).

## Key Features

### For Users
- **Browse by Category**: Find books easily using organized categories.
- **Detailed Information**: View book details, descriptions, and user reviews.
- **Shopping Cart**: Add books to your cart for a seamless checkout experience.
- **Order Management**: Place and track your orders.
- **Digital Library**: Read and download e-books in PDF format.
- **Sell Books**: Registered users can list their own books for sale.

### For Admins
- **Inventory Management**: Add, update, or remove books and e-books.
- **User Management**: Oversee user accounts and activities.
- **Order Fulfillment**: Review, approve, and deliver customer orders.
- **System Monitoring**: Full control over categories and site content.

## Project Architecture

- **Backend**: PHP CodeIgniter 3.1.10 (MVC Framework)
- **Frontend**: HTML5, CSS3, Bootstrap 4
- **Interactive Elements**: jQuery, JavaScript
- **Database**: MySQL (optimized for Replit PostgreSQL environment)

## Setup and Deployment

### One-Click Deployment
To deploy this project to Render or a similar cloud service, click the button above. For Replit users, simply use the **Publish** button in the workspace.

### Manual Setup
1. **Database**: Import the SQL schema located in `tool/ebookshop.sql`.
2. **Configuration**: Update `application/config/config.php` with your target URL.
3. **Environment**: Ensure your server is configured to handle the custom routing via `router.php`.

---
*Maintained by Hamsafar Book Center*
