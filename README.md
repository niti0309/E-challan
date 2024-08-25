# E-Challan Website

A comprehensive digital E-Challan system developed using XAMPP server for both police and drivers to generate, view, and pay traffic fines online. This project aims to streamline traffic violation management by providing a user-friendly interface for efficient fine management.

## Features

- **Police Side**:
  - Generate traffic challans in real-time.
  - Manage and track fines issued.
  - View detailed records of traffic violations.

- **Driver Side**:
  - View issued traffic challans and details.
  - Securely pay fines online.
  - Receive notifications for unpaid fines.

## Technologies Used

- **Backend**: PHP, XAMPP Server
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **Tools**: Visual Studio Code

## Installation

1. **Clone the repository**:
    ```bash
    git clone https://github.com/niti0309/e-challan-website.git
    ```

2. **Set up XAMPP server**: 
   - Download and install XAMPP from [Apache Friends](https://www.apachefriends.org/index.html).
   - Start the Apache and MySQL services from the XAMPP control panel.

3. **Configure the Database**:
   - Open `phpMyAdmin` from the XAMPP control panel.
   - Create a new database (e.g., `echallan_db`).
   - Import the `echallan_db.sql` file from the project repository to set up the necessary tables.

4. **Deploy the Project**:
   - Copy the cloned repository folder into the `htdocs` directory of your XAMPP installation (e.g., `C:/xampp/htdocs/`).
   - Open a web browser and go to `http://localhost/e-challan-website` to access the website.

## Usage

- **Police Dashboard**: Allows officers to log in and manage traffic violations and fines.
- **Driver Portal**: Allows drivers to log in, view their fines, and make payments securely.
