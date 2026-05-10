<div align="center">

# 💇‍♀️ A1 Salon & Academy Management System

### Enterprise-Level Salon, Beauty Academy & Staff Management Platform

A complete Laravel-based management ecosystem designed for modern salons, beauty academies, staff payroll management, student administration, enquiry handling, and smart business operations.

![Laravel](https://img.shields.io/badge/Laravel-Framework-red)
![PHP](https://img.shields.io/badge/PHP-Backend-blue)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange)
![Salon](https://img.shields.io/badge/Salon-Management-success)
![Academy](https://img.shields.io/badge/Academy-System-purple)
![Status](https://img.shields.io/badge/Project-Production_Ready-brightgreen)

</div>

---

# ✨ Platform Overview

Salon & Academy Management System is a complete business management platform developed using Laravel.

The system is designed for real-world salon and academy operations where:

* 👨‍💼 Admin manages the complete platform
* 💇‍♀️ Salon staff handle customer services
* 👩‍🎓 Students join beauty academy courses
* 👩‍🏫 Trainers manage classes and batches
* 📚 Courses & batch scheduling are managed automatically
* 💰 Staff salary and commission are calculated automatically
* 📦 Billing, enquiries, attendance, certificates, and payments are fully managed

The platform combines salon operations and academy management into one enterprise-level ecosystem.

---

# 🏢 Enterprise System Architecture

```text
                           ┌────────────────────┐
                           │       ADMIN        │
                           │ Complete Control   │
                           └─────────┬──────────┘
                                     │
        ┌────────────────────────────┼────────────────────────────┐
        │                            │                            │
        ▼                            ▼                            ▼

 ┌────────────────┐       ┌──────────────────┐       ┌────────────────┐
 │ SALON SYSTEM   │       │ ACADEMY SYSTEM   │       │ ENQUIRY SYSTEM │
 └──────┬─────────┘       └────────┬─────────┘       └──────┬─────────┘
        │                          │                         │
        ▼                          ▼                         ▼

 ┌────────────────┐       ┌──────────────────┐      ┌─────────────────┐
 │ STAFF & CLIENT │       │ STUDENTS/BATCHES │      │ AUTO SCHEDULING │
 │ MANAGEMENT     │       │ COURSES/TRAINERS │      │ FOLLOW UPS      │
 └──────┬─────────┘       └────────┬─────────┘      └────────┬────────┘
        │                          │                         │
        └──────────────┬───────────┴──────────────┬──────────┘
                       │                          │
                       ▼                          ▼

             ┌──────────────────────────────────────┐
             │    BILLING • PAYMENTS • SALARY       │
             │ COMMISSION • CERTIFICATES • REPORTS  │
             └──────────────────────────────────────┘
```

---

# 💇‍♀️ Salon Management System

The platform contains a complete salon workflow with customer management, staff handling, service billing, salary calculation, and appointment scheduling.

## Salon Features

✅ Customer Management System
✅ Salon Service Management
✅ Staff Management
✅ Appointment Scheduling
✅ Auto Billing Generation
✅ Invoice Management
✅ Customer History Tracking
✅ Service Reports
✅ Staff Attendance
✅ Salon Dashboard
✅ Dark & Light Theme Support

---

# 👩‍💼 Staff Salary & Commission System

The system supports both fixed salary and service-based commission workflows.

## Salary Features

✅ Fixed Salary System
✅ Service-Based Commission
✅ Automatic Monthly Salary Calculation
✅ Commission Percentage Calculation
✅ Salary Reports
✅ Paid / Unpaid Salary Tracking
✅ Salary Slip Generation
✅ Staff Performance Reports

---

# 💰 Commission Workflow

```text
Customer Takes Service
            │
            ▼
Service Bill Generated
            │
            ▼
Commission Automatically Calculated
            │
 ┌──────────┼──────────┐
 ▼          ▼          ▼

Admin     Staff      Reports
Revenue   Earnings   Updated
```

### Example

If a service amount is ₹1000 and staff commission is 10%,
then the staff automatically receives ₹100 commission.

The system calculates all commissions automatically at month-end.

---

# 👩‍🎓 Academy Management System

The academy module manages students, trainers, courses, batches, schedules, fees, and certificates.

## Academy Features

✅ Student Admission System
✅ Course Management
✅ Batch Management
✅ Trainer / Teacher Management
✅ Student Attendance
✅ Class Scheduling
✅ Course Duration Tracking
✅ Student Fee Management
✅ Pending Fee Tracking
✅ Student Performance Monitoring
✅ Certificate Generation System
✅ Academy Dashboard

---

# 📚 Student Learning Workflow

```text
Student Enquiry
        │
        ▼
Admission Process
        │
        ▼
Course Selection
        │
        ▼
Batch Assigned
        │
        ▼
Trainer Assigned
        │
        ▼
Class Schedule Management
        │
        ▼
Fee Collection Workflow
        │
        ▼
Course Completion
        │
        ▼
Certificate Generated
```

---

# 👩‍🏫 Trainer & Batch Management

The academy includes complete trainer and class scheduling workflows.

## Trainer Features

✅ Trainer Management
✅ Batch Assignment
✅ Student Attendance Tracking
✅ Class Scheduling
✅ Course Monitoring
✅ Batch Time Management
✅ Student Progress Reports

---

# 📞 Enquiry & Follow-Up System

The platform supports enquiries for both salon services and academy admissions.

## Enquiry Features

✅ Salon Enquiries
✅ Academy Admission Enquiries
✅ Auto Follow-Up Scheduling
✅ Customer Follow-Up Tracking
✅ Status Management
✅ Lead Monitoring
✅ Enquiry Dashboard

---

# 📦 Smart Billing & Invoice System

The billing system automatically generates invoices and payment records.

## Billing Features

✅ Auto Invoice Generation
✅ Service Billing
✅ Payment Tracking
✅ Due Payment Monitoring
✅ Student Fee Receipts
✅ Monthly Reports
✅ Revenue Tracking

---

# 🔐 Authentication & Security System

The platform includes secure role-based authentication.

## Security Features

✅ Admin Authentication
✅ Staff Login System
✅ Trainer Authentication
✅ Student Login Access
✅ Secure Password Protection
✅ Role-Based Access Control
✅ Middleware Protection
✅ Secure Session Management

---

# 🎨 UI / UX Features

The system provides a modern responsive interface.

## Interface Features

✅ Dark Theme Support
✅ Light Theme Support
✅ Responsive Dashboard Design
✅ Modern User Interface
✅ Mobile Friendly Layout
✅ Professional Admin Panels

---

# 📊 Dashboard System

Every role has a dedicated dashboard with specific permissions.

## Dashboard Access

✅ Admin Dashboard
✅ Salon Staff Dashboard
✅ Academy Dashboard
✅ Trainer Dashboard
✅ Student Dashboard

---

# ⚙️ Technology Stack

## Backend

* Laravel Framework
* PHP
* MySQL Database
* MVC Architecture
* RESTful Workflow

## Frontend

* Blade Templates
* HTML5
* CSS3
* JavaScript
* Bootstrap / Tailwind CSS

## Additional Features

* Authentication System
* Auto Salary Calculation
* Commission Workflow
* Billing Management
* Enquiry Management
* Certificate Generation
* Batch Scheduling
* Attendance Management

---

# 🚀 Enterprise-Level Features

✅ Advanced Salon Management System
✅ Complete Beauty Academy Workflow
✅ Automatic Salary Calculation
✅ Staff Commission Management
✅ Auto Invoice Generation
✅ Smart Enquiry Management
✅ Batch & Course Scheduling
✅ Student Fee Tracking
✅ Trainer Management System
✅ Customer Relationship Management
✅ Dark & Light Theme Support
✅ Certificate Generation Workflow
✅ Attendance Tracking System
✅ Role-Based Authentication
✅ Professional Dashboard System
✅ Responsive Enterprise UI
✅ High-Level Laravel MVC Architecture
✅ Real Business Workflow Implementation


---

# 🎯 Vision & Purpose

The goal of this platform is to provide a complete enterprise-level management ecosystem for salons and beauty academies.

The system helps businesses:

* Manage salon operations efficiently
* Handle academy students and courses professionally
* Track staff salaries and commissions automatically
* Manage enquiries and follow-ups smartly
* Generate certificates and invoices automatically
* Monitor complete business operations from one dashboard

This project combines salon management, academy administration, payroll systems, enquiry tracking, and enterprise workflows into one complete Laravel-based solution.

---

# 👨‍💻 Developer

## Ayesha Siddiqui

GitHub:
[https://github.com/aayasha-siddiqui](https://github.com/aayasha-siddiqui)

---

# 📄 License

This project is developed for educational, portfolio, and advanced commercial learning purposes.
