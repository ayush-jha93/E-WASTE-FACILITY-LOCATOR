# 🌿 EcoRecycle — E-Waste Facility Locator

EcoRecycle is a modern, responsive web application designed to help users in India locate certified e-waste recycling facilities near them. It empowers individuals and businesses to dispose of electronic waste responsibly by providing a comprehensive database of recycling centers, educational resources, and environmental impact tools.

## 🚀 Key Features

*   **Facility Locator:** Search for certified e-waste recycling facilities by pincode, state, or facility type.
*   **Interactive Map:** View all facilities on an interactive map powered by Leaflet.js and OpenStreetMap.
*   **Educational Resources:** Access a curated library of recycling guides, videos, industry articles, and impact calculators.
*   **Local Storage Contact Form:** A functional, serverless contact form that saves messages locally in your browser.
*   **Modern UI:** A premium, fully responsive design built with Tailwind CSS, solid layout styling, and dynamic Lottie animations.

## 🛠️ Tech Stack

*   **Frontend:** HTML5, Tailwind CSS (CDN), FontAwesome Icons
*   **Backend:** PHP 8.2 (runs locally & supported as serverless functions)
*   **Maps:** Leaflet.js, OpenStreetMap
*   **Animations:** Lottie Web
*   **Database:** JSON (`data/facilities.json`) - *No external database required!*
*   **Deployment Configuration:** Vercel Serverless PHP (`vercel-php`)

## 🗂️ Project Structure

```text
E_watse_Facility/
├── api/                   # PHP Serverless Entry Points (required for Vercel)
│   ├── index.php          # Home Page
│   ├── Facility.php       # Facility Locator Page
│   ├── Resources.php      # Educational Hub
│   ├── contact.php        # Contact Form
│   ├── videos.php         # Video Gallery
│   └── includes/          # Shared PHP components (header, footer)
├── assets/                # Static files
│   ├── animations/        # Lottie JSON files
│   └── img/               # Images and icons
├── data/                  # Static database
│   └── facilities.json    # Centralized facility directory
└── vercel.json            # Vercel deployment configuration
```

## 💻 Running Locally

To run this application locally, you need PHP installed on your machine.

1.  Start the PHP built-in server from the root directory:
    ```bash
    php -S localhost:8080 -t .
    ```
2.  Open your browser and navigate to the `api` routes (e.g., `http://localhost:8080/api/index.php`).

---

## 👥 Project Team Members

| Name | Role / Info | GitHub | LinkedIn |
| :--- | :--- | :--- | :--- |
| **Harsh Kumar** | Reg. No: 12311405 <br> Roll No: 15 <br> Section: K23BM | [GitHub Profile](https://github.com/Harshkumar1007) | [LinkedIn Profile](https://www.linkedin.com/in/harsh-sharma-748440298/) |
| **Ayush Jha** | Reg. No: 12325270 <br> Roll No: 23 <br> Section: K23BM | [GitHub Profile](https://github.com/ayush12325270) | [LinkedIn Profile](https://www.linkedin.com/in/ayush-jha93/) |
| **Nitin Kumar Singh** | Reg. No: 12311350 <br> Roll No: 17 <br> Section: K23BM | [GitHub Profile](https://github.com/nitin62043) | [LinkedIn Profile](https://www.linkedin.com/in/nitin-kumar-singh-/) |
| **Riya** | Reg. No: 12326877 <br> Roll No: 24 <br> Section: K23BM | [GitHub Profile](https://github.com/briya1597) | [LinkedIn Profile](https://www.linkedin.com/in/riya-bisht-a3149a297/) |
