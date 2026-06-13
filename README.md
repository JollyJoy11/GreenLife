# GreenLife

A web-based plant and herbarium management system built with PHP and MySQL. GreenLife allows users to explore plant classifications, learn herbarium techniques, identify plants, and contribute their own plant specimens.

## Features

- **Plant Classification** — Browse plants organized by family, genus, and species (focused on Lauraceae)
- **Herbarium Guide** — Step-by-step tutorial, tools reference, and care tips for herbarium specimens
- **Plant Identification** — Identify plants using an interactive global forest map and reference data
- **User Contributions** — Registered users can submit plant and herbarium photos for admin review
- **Enquiry System** — Submit enquiries; admins reply via email using PHPMailer
- **Feedback** — Star-rating feedback form on the homepage
- **Search** — Site-wide keyword search
- **User Auth** — Registration, login, OTP email verification, and profile management
- **Admin Dashboard** — Manage users, contributions, enquiries, and feedback; soft-delete with recycle bin

## Tech Stack

- **Backend**: PHP (procedural)
- **Database**: MySQL (via MySQLi)
- **Frontend**: HTML, CSS, Font Awesome icons
- **Email**: PHPMailer
- **Server**: Apache (XAMPP)

## Prerequisites

- [XAMPP](https://www.apachefriends.org/) (PHP 7.4+ and MySQL)
- A web browser

## Setup

1. Clone or copy the project into your XAMPP `htdocs` folder:
   ```
   C:\xampp\htdocs\GreenLife\
   ```

2. Start **Apache** and **MySQL** in the XAMPP Control Panel.

3. Open your browser and go to:
   ```
   http://localhost/GreenLife/
   ```
   The database and all tables are created automatically on first load.

4. Create the upload directory for user-submitted images (the app writes to it but git does not track it):
   ```
   mkdir upload_img
   ```

5. Default admin credentials:
   - **Username**: `Admin`
   - **Password**: `Admin`

## Project Structure

```
GreenLife/
├── index.php               # Homepage with feedback form
├── classify.php            # Plant classification browser
├── identify.php            # Plant identification page
├── tutorial.php            # Herbarium tutorial
├── tools.php               # Herbarium tools guide
├── care.php                # Herbarium care guide
├── search.php              # Search results
├── contribute.php          # User contribution form
├── contribute_process.php  # Contribution form handler
├── enquiry.php             # Enquiry form
├── enquiry_process.php     # Enquiry handler + email reply
├── login.php               # Login page
├── profile.php             # User profile
├── registration.php        # User registration
├── aboutme1–4.php          # Team member profile pages
├── acknowledgement.php     # Acknowledgements
├── view_user.php           # Admin: manage users
├── view_feedback.php       # Admin: view feedback
├── view_enquiry.php        # Admin: manage enquiries
├── view_contribute.php     # Admin: review contributions
├── recyclebin.php          # Admin: soft-deleted records
├── restore.php             # Admin: restore from bin
├── movetobin.php           # Soft-delete handler
├── enhancement1.php        # Enhancement feature 1
├── enhancement2.php        # Enhancement feature 2
├── include/
│   ├── database.php        # DB connection + table creation
│   ├── functions.php       # Shared utility functions
│   ├── header.php          # Site navigation header
│   ├── admin_header.php    # Admin navigation header
│   ├── session.php         # Session initialization
│   ├── errors.php          # Error display helper
│   ├── enquiry_btn.php     # Floating enquiry button
│   └── identify_result.php # Plant ID result partial
├── styles/
│   └── style.css           # Main stylesheet
├── images/                 # Static site images
├── upload_img/             # User-uploaded images (not tracked by git)
└── phpmailer/              # PHPMailer library
```

## Team

| Member | Pages |
|--------|-------|
| Ellie  | aboutme1.php |
| Joanne | aboutme2.php |
| Aryn   | aboutme3.php · identify.php |
| Cyndia | aboutme4.php |
