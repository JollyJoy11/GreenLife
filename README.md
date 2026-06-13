# GreenLife

A web-based plant and herbarium management system built with PHP and MySQL. GreenLife allows users to explore plant classifications, learn herbarium techniques, identify plants, and contribute their own plant specimens.

## Features

- **Plant Classification** — Browse plants organized by family, genus, and species (focused on Lauraceae)
- **Herbarium Guide** — Step-by-step tutorial, tools reference, and care tips for herbarium specimens
- **Plant Identification** — Upload a plant photo and get AI-powered species predictions using a Keras model
- **User Contributions** — Registered users can submit plant and herbarium photos for admin review
- **Enquiry System** — Submit enquiries; admins reply via email using PHPMailer
- **Feedback** — Star-rating feedback form on the homepage
- **Search** — Site-wide keyword search
- **User Auth** — Registration, login, OTP email verification, and profile management
- **Admin Dashboard** — Manage users, contributions, enquiries, and feedback; soft-delete with recycle bin

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP (procedural) |
| Database | MySQL (via MySQLi) |
| Frontend | HTML, CSS, Font Awesome icons |
| Email | PHPMailer |
| Local server | Apache (XAMPP) |
| ML service | Python, Flask, TensorFlow 2.14 / Keras |
| PHP hosting | InfinityFree |
| ML hosting | Render |
| CI/CD | GitHub Actions (auto-deploy to InfinityFree via FTP) |

## Architecture

```
Browser
  │
  ├── InfinityFree (PHP + MySQL)
  │     └── identify feature calls →
  │
  └── Render (Python Flask + Keras model)
```

## Local Development Setup

### Prerequisites
- [XAMPP](https://www.apachefriends.org/) (PHP 7.4+ and MySQL)
- [Miniconda](https://docs.conda.io/en/latest/miniconda.html) (for the Python identification service)

### PHP App

1. Clone the repo into your XAMPP `htdocs` folder:
   ```
   C:\xampp\htdocs\GreenLife\
   ```

2. Create `config.php` in the project root (this file is excluded from git):
   ```php
   <?php
       define('DB_HOST', 'localhost');
       define('DB_USER', 'root');
       define('DB_PASS', '');
       define('DB_NAME', 'greenlife');
   ?>
   ```

3. Start **Apache** and **MySQL** in XAMPP Control Panel.

4. Visit `http://localhost/GreenLife/` — the database and tables are created automatically.

5. Default admin credentials:
   - **Username**: `Admin`
   - **Password**: `Admin`

### Python Identification Service

1. Create and activate a conda environment:
   ```
   conda create --name myenv python=3.11
   conda activate myenv
   ```

2. Install dependencies:
   ```
   pip install tensorflow==2.14.0 keras==2.14.0 "numpy<2.0" pillow flask
   ```

3. Start the Flask server:
   ```
   cd Plant
   python plant_identification.py
   ```
   The service runs on `http://localhost:5000`. The PHP app will call it automatically when identifying plants.

## Deployment

### PHP App — InfinityFree
Deployed automatically via **GitHub Actions** on every push to `main`. The workflow:
- Generates `config.php` from GitHub Secrets (DB credentials never stored in code)
- Uploads all files to InfinityFree via FTP

Required GitHub Secrets:

| Secret | Description |
|---|---|
| `FTP_HOST` | InfinityFree FTP host |
| `FTP_USER` | InfinityFree FTP username |
| `FTP_PASS` | InfinityFree FTP password |
| `DB_HOST` | InfinityFree MySQL host |
| `DB_USER` | InfinityFree MySQL username |
| `DB_PASS` | InfinityFree MySQL password |
| `DB_NAME` | InfinityFree MySQL database name |

### Python Service — Render
Deployed from the `Plant/` folder using `render.yaml`. Render detects the config automatically.

> **Note:** The plant identification feature requires the Python service to be running. On Render's free tier, the service sleeps after 15 minutes of inactivity (first request after sleep takes ~30s to wake up). Due to memory constraints on the free tier (512MB), the identification feature may not be available on the live site — it works fully in local development.

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
├── config.php              # DB credentials — NOT in git, create manually
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
├── upload_img/             # User-uploaded contribution images (not tracked by git)
├── identify_img/           # Temporary identify uploads (not tracked by git)
├── Plant/
│   ├── plant_identification.py  # Flask API for plant identification
│   ├── keras_model.h5           # Trained Keras model
│   └── requirements.txt         # Python dependencies
├── phpmailer/              # PHPMailer library
├── render.yaml             # Render deployment config
└── .github/
    └── workflows/
        └── deploy.yml      # GitHub Actions auto-deploy to InfinityFree
```

## Team

| Member | Pages |
|--------|-------|
| Ellie  | aboutme1.php |
| Joanne | aboutme2.php |
| Aryn   | aboutme3.php |
| Cyndia | aboutme4.php |
