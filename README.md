# Project Management Tool

---

## Installation

Clone repository into your packages' folder:
```bash
git clone https://github.com/breuermarcel/project-management.git
```

Define your package repositories: dev
```json
"repositories": [
    {
        "type":"path",
        "url": "./packages/*",
        "options": {
            "symlink": true
        }
    }
],
```

Define your package repositories: live/latest version
```json
"repositories": [
    {
        "type":"package",
        "package": {
            "name": "breuermarcel/project-management",
            "version":"master",
            "source": {
                "url": "https://github.com/breuermarcel/project-management.git",
                "type": "git",
                "reference":"master"
            }
        }
    }
],
```

Require package:
```bash
composer require breuermarcel/project-management
```

Publish assets:
```bash
php artisan vendor:publish --provider="Breuermarcel\ProjectManagement\ProjectManagementServiceProvider" --tag="assets"
```

Migrate database:
```bash
php artisan migrate
```

---

## Data Structure

---

## ToDo's

- [ ] custom validation message for digits and numbers
- [ ] make status customisable
- [ ] upload files to projects
- [ ] add translations
- [ ] start time tracking
- [ ] end time tracking
- [X] show open time tracking
- [ ] sum of current week tracking
- [ ] create offer
- [ ] export offer as .pdf
- [ ] search for customers, projects, tasks
- [ ] pagination for projects
- [ ] pagination for customers
- [ ] pagination for tasks
